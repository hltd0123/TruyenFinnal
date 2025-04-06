<?php
namespace App\Http\Controllers;

use App\Models\Category;
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
    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        // Lưu bình luận
        $story = Story::findOrFail($id);
        $story->comments()->create([
            'userId' => auth()->id(),
            'content' => $request->input('content'),
            'status' => 1, // Đặt status là 1, bạn có thể thay đổi theo yêu cầu
        ]);

        return redirect()->route('story.details', $id);
    }
}
