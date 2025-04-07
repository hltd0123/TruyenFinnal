<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Story;
use Illuminate\Http\Request;

class SearchController extends AppBaseController
{
    public function showCategory($id)
    {
        // Lấy thể loại và các câu chuyện thuộc thể loại đó
        $category = Category::findOrFail($id);
        $categories = Category::all(); // Lấy tất cả các thể loại để hiển thị trên header
        $stories = Story::where('categoryId', $id)->paginate(10); // Giới hạn 10 truyện mỗi trang
        $searchType = 'Tìm theo thể loại'; // Để biết loại tìm kiếm là thể loại

        return view('userView.searchView', compact('category', 'stories', 'categories', 'searchType'));
    }

    public function showSearch(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request
        $keyword = $request->input('keyword');
        $categories = Category::all(); // Lấy tất cả các thể loại để hiển thị trên header
        if($keyword != null){
            $stories = Story::where('title', 'like', '%' . $keyword . '%')->paginate(10);
        }
        else {
            $stories = Story::paginate(10);
        }
        $searchType = 'Tìm theo tên truyện'; // Để biết loại tìm kiếm là tên truyện

        return view('userView.searchView', compact('stories', 'categories', 'searchType', 'keyword'));
    }
}
