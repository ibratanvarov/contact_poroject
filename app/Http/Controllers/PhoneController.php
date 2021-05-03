<?php


namespace App\Http\Controllers;


use App\Models\Contact;
use App\Models\Phone_number;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function index()
    {

    }

    public function create($id)
    {

        $data = Contact::find($id);

        return view('email_and_phone_views\phone_number_create',compact('data'));
    }

    public function store(Request $request,$id)
    {

        $validated_data =  $this->validate($request, [
            'phone' => 'required|string|digits:12|unique:phone_numbers,phone',
        ]);

        $validated_data = [
            'phone' => $request->phone,
            'contact_id' => $request->id

        ];

        if($validated_data)
        {
            $phone = new Phone_number($validated_data);
            $phone->save();
            if ($phone) {
                return redirect()->route('phones.create',['id'=>$id])
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
        $phone = Phone_number::findOrFail($id);

        return view('email_and_phone_views\phone_number_update', compact('phone'));
    }

    public function update(Request $request,$id)
    {
        $validated_phone = $this->validate($request, [
            'phone' => 'required|string|digits:12|unique:phone_numbers,phone'
        ]);

        $phone = Phone_number::find($id);
        $phone->update($validated_phone);

        if ($phone)
        {
            return redirect()->route('contacts.show',['id'=>$phone->contact_id])
                ->with(['success' => 'Успешно обновлено']);
        }
        else
        {
            return back()->withErrors(['msg' => 'Такое даные уже есть'])
                ->withInput();
        }
    }

    public function delete($id)
    {
        $phone = Phone_number::find($id);
        $id = $phone->contact_id;
        $phone->delete();

        return redirect()->route('contacts.show',$id);
    }
}
