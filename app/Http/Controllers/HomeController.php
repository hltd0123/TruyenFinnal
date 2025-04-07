<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Story;
use Illuminate\Http\Client\Request;

class HomeController extends AppBaseController
{
    // Trang chủ
    public function index()
    {
        // Lấy 5 sách mới nhất
        $latestStorys = Story::latest()->take(5)->get();

        // Lấy 5 sách mới cập nhật
        $newStorys = Story::latest()->take(5)->get();

        // Lấy 5 sách được yêu thích nhất
        $topStorys = Story::latest()->take(5)->get();

        // Lấy category để cho header
        $categories = Category::all();

        return view('userView.index', data: [
            'latestStorys' => $latestStorys,
            'newStorys' => $newStorys,
            'topStorys' => $topStorys,
            'categories' => $categories,
        ]);
    }

    // Hiển thị chi tiết câu chuyện
    public function showDetails($id)
    {
        // Lấy thông tin của Story, Category, Author và Chapters từ cơ sở dữ liệu
        $story = Story::with(['category', 'author', 'chapters'])->findOrFail($id);
        
        // Lấy các bình luận của câu chuyện
        $comments = Comment::where('storyId', $id)->get();

        // Lấy category để cho header
        $categories = Category::all();
        
        // Trả về view với dữ liệu
        return view('userView.story-detail', compact('story', 'comments', 'categories'));
    }

    // Lưu bình luận vào cơ sở dữ liệu
    public function storeComment(Request $request, $storyName, $chapterNumber = null)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $storyName = urldecode($storyName);
        $chapterIdSave = null;

        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để bình luận.');
        }

        // Kiểm tra xem câu chuyện có tồn tại không
        $story = Story::where('title', $storyName)->firstOrFail();
        if($chapterNumber != null){
            $chapter = Chapter::where('storyId', $story->id)->where('chapterNumber', $chapterNumber)->firstOrFail();
            $chapterIdSave = $chapter->id;
        }

        // Lưu bình luận
        Comment::create([
            'userId' => auth()->id(),
            'content' => $request->input('content'),
            'storyId' => $story->id,
            'chapterId' => $chapterIdSave,
            'status' => 1, // Đặt status là 1
        ]);

        return redirect()->back()->with('success', 'Bình luận của bạn đã được lưu.');
    }
    
    public function showChapter($storyName, $chapterNumber)
    {
        $storyName = urldecode($storyName);

        $categoies = Category::all();
        $story = Story::where('title', $storyName)->firstOrFail();
        $chapter = Chapter::where('storyId', $story->id)->where('chapterNumber', $chapterNumber)->firstOrFail();
        $comments = Comment::where('chapterId', $chapter->id)->get();

        return view('userView.chapter-view')
            ->with('story', $story)
            ->with('chapter', $chapter)
            ->with('comments', $comments)
            ->with('categories', $categoies);
    }
}