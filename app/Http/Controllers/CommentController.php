<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Chapter;
use App\Models\Story;
use App\Models\User;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;
use Flash;

class CommentController extends AppBaseController
{
    /** @var CommentRepository $commentRepository*/
    private $commentRepository;
    private $layout = "layouts.navadmin";

    public function __construct(CommentRepository $commentRepo)
    {
        $this->commentRepository = $commentRepo;
    }

    /**
     * Display a listing of the Comment.
     */
    public function index(Request $request)
    {
        $comments = $this->commentRepository->paginate(10);

        return view('comments.index')
            ->with('comments', $comments)
            ->with('layout', $this->layout);
    }

    /**
     * Show the form for creating a new Comment.
     */
    public function create()
    {
        $users = User::pluck('name', 'id');
        $stories = Story::pluck('title', 'id');
        $chapters = Chapter::pluck('chapterTitle', 'id');
        return view('comments.create')
            ->with('users', $users)
            ->with('stories', $stories)
            ->with('chapters', $chapters)
            ->with('layout', $this->layout);
    }

    /**
     * Store a newly created Comment in storage.
     */
    public function store(CreateCommentRequest $request)
    {
        $input = $request->all();

        $comment = $this->commentRepository->create($input);

        Flash::success('Comment saved successfully.');

        return redirect(route('comments.index'));
    }

    /**
     * Display the specified Comment.
     */
    public function show($id)
    {
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            Flash::error('Comment not found');

            return redirect(route('comments.index'));
        }

        return view('comments.show')->with('comment', $comment)->with('layout', $this->layout);
    }

    /**
     * Show the form for editing the specified Comment.
     */
    public function edit($id)
    {
        $comment = $this->commentRepository->find($id);
        

        if (empty($comment)) {
            Flash::error('Comment not found');

            return redirect(route('comments.index'));
        }

        $users = User::pluck('name', 'id');
        $stories = Story::pluck('title', 'id');
        $chapters = Chapter::pluck('chapterTitle', 'id');

        return view('comments.edit')
            ->with('comment', $comment)
            ->with('layout', $this->layout)
            ->with('users', $users)
            ->with('stories', $stories)
            ->with('chapters', $chapters);
    }

    /**
     * Update the specified Comment in storage.
     */
    public function update($id, UpdateCommentRequest $request)
    {
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            Flash::error('Comment not found');

            return redirect(route('comments.index'));
        }

        $comment = $this->commentRepository->update($request->all(), $id);

        Flash::success('Comment updated successfully.');

        return redirect(route('comments.index'));
    }

    /**
     * Remove the specified Comment from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            Flash::error('Comment not found');

            return redirect(route('comments.index'));
        }

        $this->commentRepository->delete($id);

        Flash::success('Comment deleted successfully.');

        return redirect(route('comments.index'));
    }
}
