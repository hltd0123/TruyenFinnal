<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateChapterRequest;
use App\Http\Requests\UpdateChapterRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ChapterRepository;
use Illuminate\Http\Request;
use Flash;

class ChapterController extends AppBaseController
{
    /** @var ChapterRepository $chapterRepository*/
    private $chapterRepository;
    private $layout = "layouts.navadmin";

    public function __construct(ChapterRepository $chapterRepo)
    {
        $this->chapterRepository = $chapterRepo;
    }

    /**
     * Display a listing of the Chapter.
     */
    public function index(Request $request)
    {
        $chapters = $this->chapterRepository->paginate(10);

        return view('chapters.index')
            ->with('chapters', $chapters)
            ->with('layout', $this->layout);
    }

    /**
     * Show the form for creating a new Chapter.
     */
    public function create()
    {
        return view('chapters.create')->with('layout', $this->layout);
    }

    /**
     * Store a newly created Chapter in storage.
     */
    public function store(CreateChapterRequest $request)
    {
        $input = $request->all();

        $chapter = $this->chapterRepository->create($input);

        Flash::success('Chapter saved successfully.');

        return redirect(route('chapters.index'));
    }

    /**
     * Display the specified Chapter.
     */
    public function show($id)
    {
        $chapter = $this->chapterRepository->find($id);

        if (empty($chapter)) {
            Flash::error('Chapter not found');

            return redirect(route('chapters.index'));
        }

        return view('chapters.show')->with('chapter', $chapter)->with('layout', $this->layout);
    }

    /**
     * Show the form for editing the specified Chapter.
     */
    public function edit($id)
    {
        $chapter = $this->chapterRepository->find($id);

        if (empty($chapter)) {
            Flash::error('Chapter not found');

            return redirect(route('chapters.index'));
        }

        return view('chapters.edit')->with('chapter', $chapter)->with('layout', $this->layout);
    }

    /**
     * Update the specified Chapter in storage.
     */
    public function update($id, UpdateChapterRequest $request)
    {
        $chapter = $this->chapterRepository->find($id);

        if (empty($chapter)) {
            Flash::error('Chapter not found');

            return redirect(route('chapters.index'));
        }

        $chapter = $this->chapterRepository->update($request->all(), $id);

        Flash::success('Chapter updated successfully.');

        return redirect(route('chapters.index'));
    }

    /**
     * Remove the specified Chapter from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $chapter = $this->chapterRepository->find($id);

        if (empty($chapter)) {
            Flash::error('Chapter not found');

            return redirect(route('chapters.index'));
        }

        $this->chapterRepository->delete($id);

        Flash::success('Chapter deleted successfully.');

        return redirect(route('chapters.index'));
    }
}
