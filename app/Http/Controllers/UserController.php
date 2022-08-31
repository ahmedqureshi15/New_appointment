<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Hash;
use App\AvailableAppointments;
use App\AllLocations;
use App\User;


class UserController extends AppBaseController
{
    /** @var $userRepository UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }


    // public function __construct(AvailableAppointments $userRepo)
    // {
    //     $this->userRepository = $userRepo;
    // }




    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
       // $users = $this->userRepository->all(['is_admin' => false]);
      // $locations = $this->userRepository->all();
     // $authUser = auth()->user();
       $locations = AllLocations::get();
        return view('users.index')->with('locations', $locations);
    }


   // public function records(Request $request){


// $arObjects = AvailableAppointments::select('available_appointments.*')
// ->from('available_appointments')->get();

  //  }




     /**
     * Display a listing of the appoinments.
     *
     * @param Request $request
     *
     * @return Response
     */
    // public function appoinmentPrefences(Request $request)
    // {
    //     $input = $request->all();
    //     $input['password'] = Hash::make($input['password']);
    //     $user = $this->userRepository->create($input);

    //     Flash::success('Saved successfully.');

    //     return redirect(route('users.index'));
    // }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        //$input['password'] = Hash::make($input['password']);
        $user = $this->userRepository->create($input);

        Flash::success('Saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        $input =  $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }
        $user = $this->userRepository->update($input, $id);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }
}