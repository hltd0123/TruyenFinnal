<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\User;
use App\Repositories\AuthorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Flash;

class AuthorController extends AppBaseController
{
    /** @var AuthorRepository $authorRepository*/
    private $authorRepository;
    private $layout = "layouts.navadmin";

    public function __construct(AuthorRepository $authorRepo)
    {
        $this->authorRepository = $authorRepo;
    }

    /**
     * Display a listing of the Author.
     */
    public function index(Request $request)
    {
        $authors = $this->authorRepository->paginate(10);

        return view('authors.index')
            ->with('authors', $authors)
            ->with('layout', $this->layout);
    }

    /**
     * Show the form for creating a new Author.
     */
    public function create()
    {
        $users = User::pluck('name', 'id');
        return view('authors.create')->with('layout', $this->layout)->with('users', $users );
    }

    /**
     * Store a newly created Author in storage.
     */
    public function store(CreateAuthorRequest $request)
    {
        // Bắt đầu transaction
        DB::beginTransaction();

        try {
            // Lấy dữ liệu từ form
            $input = $request->all();

            //Tạo mới user
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => bcrypt($input['password']),
                'role' => '1',
            ]);

            // Lưu User
            $input['userId'] = $user->id;

            // Tạo mới author
            $author = $this->authorRepository->create($input);

            // Commit transaction nếu không có lỗi
            DB::commit();

            // Hiển thị thông báo thành công
            Flash::success('Author saved successfully.');

            // Redirect về trang danh sách tác giả
            return redirect(route('authors.index'));

        } catch (\Exception $e) {
            // Nếu có lỗi xảy ra, rollback transaction
            DB::rollBack();
            @dd($e->getMessage());

            // Hiển thị thông báo lỗi
            Flash::error('Error khi lưu author: ' . $e->getMessage());

            // Quay lại trang trước đó với thông báo lỗi
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified Author.
     */
    public function show($id)
    {
        $author = $this->authorRepository->find($id);


        if (empty($author)) {
            Flash::error('Author not found');

            return redirect(route('authors.index'));
        }

        return view('authors.show')->with('author', $author)->with('layout', $this->layout);
    }

    /**
     * Show the form for editing the specified Author.
     */
    public function edit($id)
    {
        $author = $this->authorRepository->find($id);
        $users = User::pluck('name', 'id');

        if (empty($author)) {
            Flash::error('Author not found');

            return redirect(route('authors.index'));
        }

        return view('authors.edit')->with('author', $author)->with('layout', $this->layout)->with('users', $users );
    }

    /**
     * Update the specified Author in storage.
     */
    public function update($id, UpdateAuthorRequest $request)
    {
        $author = $this->authorRepository->find($id);

        if (empty($author)) {
            Flash::error('Author not found');

            return redirect(route('authors.index'));
        }

        $author = $this->authorRepository->update($request->all(), $id);

        Flash::success('Author updated successfully.');

        return redirect(route('authors.index'));
    }

    /**
     * Remove the specified Author from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $author = $this->authorRepository->find($id);

        if (empty($author)) {
            Flash::error('Author not found');

            return redirect(route('authors.index'));
        }

        $this->authorRepository->delete($id);

        Flash::success('Author deleted successfully.');

        return redirect(route('authors.index'));
    }
}
