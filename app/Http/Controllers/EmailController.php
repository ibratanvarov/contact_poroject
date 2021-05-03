<?php


namespace App\Http\Controllers;



use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function create($id)
    {
        return view('email_and_phone_views\email_create',compact('id'));
    }

    public function store(Request $request,$id)
    {
        $validated_data =  $this->validate($request, [
            'email' => 'required|string|unique:emails,email',
        ]);

        $validated_data = [
          'email' => $request->email,
          'contact_id' => $id
        ];

        if($validated_data)
        {
            $email = new Email($validated_data);
            $email->save();
            if ($email) {
                return redirect()->route('emails.create',['id'=>$id])
                    ->with(['success' => 'Успешно сахранилось']);

            }
        }
        else
        {
            return back()->withErrors(['msg' => 'Ошибки при заполнения данных'])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $email = Email::findOrFail($id);

        return view('email_and_phone_views\email_update', compact('email'));
    }

    public function update(Request $request,$id)
    {
        $validated_email = $this->validate($request, [
            'email' => 'required|email|unique:emails,email'
        ]);

        $email = Email::find($id);
        $email->update($validated_email);

        if ($email)
        {
            return redirect()->route('contacts.show',['id'=>$email->contact_id])
                ->with(['success' => 'Успешно обновлено']);
        }
        else
        {
            return back()->withErrors(['msg' => 'Ошибки при заполнения данных'])
                ->withInput();
        }
    }

    public function delete($id)
    {
        $email = Email::find($id);
        $id = $email->contact_id;
        $email->delete();

        return redirect()->route('contacts.show',$id);
    }
}
