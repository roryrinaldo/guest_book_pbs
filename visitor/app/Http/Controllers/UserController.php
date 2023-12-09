<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Models\Visitor;
use App\Models\User;

class UserController extends Controller
{
    public function dashboard(): View
    {    
        $visitors = Visitor::paginate(10);
        return view('user.dashboard', ['visitors' => $visitors]);
    }

    public function create(): View
    {
        return view('user.createVisitor');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate the form data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'nama' => 'required|string',
            'tanggal_kunjungan' => 'required|date',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'instansi' => 'required|string',
            'data_dicari' => 'required|string',
            'keperluan' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            // Add other validation rules for additional fields if needed
        ]);

        // Create a new Visitor instance and fill it with the validated data
        $visitor = new Visitor($validatedData);

        // Save the visitor to the database
        $visitor->save();

        // Redirect back to the dashboard with a success message
        return Redirect::route('dashboard')->with('success', 'Data pengunjung berhasil ditambahkan!');
        
    }

    public function edit($id)
    {
        // Retrieve the visitor based on the provided ID
        $visitor = Visitor::find($id);

        // Check if the visitor is found
        if (!$visitor) {
            abort(404); // You can customize this to handle not found case
        }

        // Return the view for editing with the visitor data
        return view('user/editVisitor', ['visitor' => $visitor]);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data as needed

        // Find the visitor based on the provided ID
        $visitor = Visitor::find($id);

        // Check if the visitor is found
        if (!$visitor) {
            abort(404); // You can customize this to handle not found case
        }

        // Update the visitor data with the new values
        $visitor->update([
            'email' => $request->input('email'),
            'nama' => $request->input('nama'),
            'tanggal_kunjungan' => $request->input('tanggal_kunjungan'),
            'alamat' => $request->input('alamat'),
            'no_hp' => $request->input('no_hp'),
            'instansi' => $request->input('instansi'),
            'data_dicari' => $request->input('data_dicari'),
            'keperluan' => $request->input('keperluan'),
            'rating' => $request->input('rating'),
            // ... (other fields)
        ]);

        // Redirect back to the list page or any other page you prefer
        return redirect()->route('dashboard')->with('success', 'Data pengunjung berhasil diperbaruhi');
    }

    public function delete($id)
    {
        // Find the visitor by ID
        $visitor = Visitor::find($id);

        // Check if the visitor exists
        if (!$visitor) {
            return Redirect::route('dashboard')->with('error', 'Visitor not found!');
        }

        // Delete the visitor
        $visitor->delete();

        // Redirect back to the dashboard with a success message
        return Redirect::route('dashboard')->with('success', 'Data pengunjung berhasil dihapus!');
    }

    //Bagian Halaman Management User-------------------------------------------------------------------------
    public function managementUser(): View
    {    
        $users = User::paginate(10);
        return view('user.managementUser', ['users' => $users]);
    }

    public function createUser(): View
    {
        return view('user.createUser');
    }

    public function storeUser(Request $request): RedirectResponse
    {
        // Validate the form data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Create a new user instance and fill it with the validated data
        $user = new User($validatedData);

         // Fill the user instance with the validated data
        $user->fill($validatedData);

        // Transform the password to MD5
        $user->password = md5($validatedData['password']);

        // Save the user to the database
        $user->save();

        // Redirect back to the managementUser with a success message
        return Redirect::route('managementUser')->with('success', 'Data user berhasil ditambahkan!');
        
    }

    public function deleteUser($id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return Redirect::route('managementUser')->with('error', 'User not found!');
        }

        // Delete the user
        $user->delete();

        // Redirect back to the managementUser with a success message
        return Redirect::route('managementUser')->with('success', 'Data user berhasil dihapus!');
    }

    public function editUser($id)
    {
        // Retrieve the visitor based on the provided ID
        $user = User::find($id);

        // Check if the visitor is found
        if (!$user) {
            abort(404); // You can customize this to handle not found case
        }

        // Return the view for editing with the user data
        return view('user/editUser', ['user' => $user]);
    }

    
    public function updateUser(Request $request, $id)
    {
        // Validate the request data as needed

        // Find the user based on the provided ID
        $user = User::find($id);

        // Check if the user is found
        if (!$user) {
            abort(404); // You can customize this to handle not found case
        }

        // Update the user data with the new values
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        // Redirect back to the list page or any other page you prefer
        return redirect()->route('managementUser')->with('success', 'Data user berhasil diperbaruhi');
    }

}
