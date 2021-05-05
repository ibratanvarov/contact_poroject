<?php


namespace App\Http\Controllers;


use App\Models\Contact;
use App\Models\Email;
use App\Models\Phone_number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
        public function index(Request $request)
    {
        $number = 0;

        if (isset($request->search)) {
            $number = 1;
            $searchoffice = $request->search;
            $items = Contact::where('name','like','%'.$searchoffice.'%')->select('name','id')->toBase()->get();


            return view('contact_views\contact_index', compact('items', 'number'));
            }

        $items = DB::table('contacts')->select('name', 'id')->paginate(5);

            return view('contact_views\contact_index',compact('items','number'));
        }

        public function show($id)
        {
            $contact = Contact::findOrFail($id);
            $items = [];
            $numbers = DB::table('phone_numbers')->select('phone','id')->where('contact_id',$id)->get();
            $emails = DB::table('emails',)->select('email','id')->where('contact_id',$id)->get();

            foreach ($numbers as $number)
            {
                $items[] = $number;
            }
            foreach ($emails as $email)
            {
                $items[] = $email;
            }

            return view('contact_views\contact_show',compact('contact','items'));
        }

        public function create()
        {
            return view('contact_views\contact_create');
        }

        public function store(Request $request)
        {
            $validated_data =  $this->validate($request, [
                'name' => 'required|string|unique:contacts,name',
            ]);

            if($validated_data)
            {
                $contact = new Contact($validated_data);
                $contact->save();
                if ($contact) {
                    return redirect()->route('contacts.create')
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
            $contact = Contact::findOrFail($id);

            return view('contact_views\contact_update', compact('contact'));
        }

        public function update(Request $request,$id)
        {
            $validated_contact = $this->validate($request, [
                'name' => 'required|string|unique:contacts,name',
            ]);
            $contact = Contact::find($id);
            $contact->update($validated_contact);

            if ($contact) {
                return redirect()->route('contacts.index')
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
            $contact = Contact::find($id);
            $contact->delete();

            return redirect()->route('contacts.index');
        }
}
