<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStoryRequest;
use App\Http\Requests\UpdateStoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Author;
use App\Models\Category;
use App\Repositories\StoryRepository;
use Illuminate\Http\Request;
use Flash;

class StoryController extends AppBaseController
{
    /** @var StoryRepository $storyRepository*/
    private $storyRepository;
    private $layout = "layouts.navadmin";

    public function __construct(StoryRepository $storyRepo)
    {
        $this->storyRepository = $storyRepo;
    }

    /**
     * Display a listing of the Story.
     */
    public function index(Request $request)
    {
        $stories = $this->storyRepository->paginate(10);

        return view('stories.index')
            ->with('stories', $stories)
            ->with('layout', $this->layout);
    }

    /**
     * Show the form for creating a new Story.
     */
    public function create()
    {
        $authors = Author::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        return view('stories.create')
        ->with('layout', $this->layout)
        ->with('authors', $authors)
        ->with('categories', $categories);
    }

    /**
     * Store a newly created Story in storage.
     */
    public function store(CreateStoryRequest $request)
    {
        $input = $request->all();

        // Kiểm tra xem có file ảnh hay không
        if ($request->hasFile('coverImage')) {
            // Lấy file ảnh từ yêu cầu
            $file = $request->file('coverImage');

            // Tạo tên file duy nhất (thường sử dụng timestamp hoặc UUID để tránh trùng lặp)
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // Lưu file vào thư mục storage/app/public/images
            $path = $file->storeAs('public/images', $filename);
            // Lưu đường dẫn ảnh vào input
            $input['coverImage'] = 'storage/images/' . $filename;
        }

        $story = $this->storyRepository->create($input);

        Flash::success('Story saved successfully.');

        return redirect(route('stories.index'));
    }

    /**
     * Display the specified Story.
     */
    public function show($id)
    {
        $story = $this->storyRepository->find($id);

        if (empty($story)) {
            Flash::error('Story not found');

            return redirect(route('stories.index'));
        }

        return view('stories.show')->with('story', $story)->with('layout', $this->layout);
    }

    /**
     * Show the form for editing the specified Story.
     */
    public function edit($id)
    {
        $story = $this->storyRepository->find($id);

        if (empty($story)) {
            Flash::error('Story not found');

            return redirect(route('stories.index'));
        }
        $authors = Author::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        return view('stories.edit')
            ->with('story', $story)
            ->with('layout', $this->layout)
            ->with('authors', $authors)
            ->with('categories', $categories);
    }

    /**
     * Update the specified Story in storage.
     */
    public function update($id, UpdateStoryRequest $request)
    {
        $story = $this->storyRepository->find($id);
        $input = $request->all();

        if (empty($story)) {
            Flash::error('Story not found');

            return redirect(route('stories.index'));
        }

        // Kiểm tra xem có file ảnh hay không
        if ($request->hasFile('coverImage')) {
            // Lấy file ảnh từ yêu cầu
            $file = $request->file('coverImage');

            // Tạo tên file duy nhất (thường sử dụng timestamp hoặc UUID để tránh trùng lặp)
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // Lưu file vào thư mục storage/app/public/images
            $file->storeAs('public/images', $filename);
            // Lưu đường dẫn ảnh vào input
            $input['coverImage'] = 'storage/images/' . $filename;
            @dd($input['coverImage']);
        }

        $story = $this->storyRepository->update($input, $id);

        Flash::success('Story updated successfully.');

        return redirect(route('stories.index'));
    }

    /**
     * Remove the specified Story from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $story = $this->storyRepository->find($id);

        if (empty($story)) {
            Flash::error('Story not found');

            return redirect(route('stories.index'));
        }

        $this->storyRepository->delete($id);

        Flash::success('Story deleted successfully.');

        return redirect(route('stories.index'));
    }
}
