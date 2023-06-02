<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\Form;
use App\Models\FormField;

class SurveyController extends Controller
{
    /**
     * Display all Form for admin user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::all();

        return view('surveys.index', ['forms' => $forms]);
    }

    /* public function formCreatePage()
    {
        return view('surveys.create_survey');
    } */

    public function SurveyGeneratePage($id)
    {
        $form = Form::findOrFail($id);
        //dd($form->field[0]->field_label);exit;

        return view('surveys.survey', 
            [
                'title' => $form->form_label,
                'id' => $form->id,
                'fields' => $form->field    
            ]
        );

    }

    public function storeform(Request $request)
    {
        //save new form
        $form = new Form();
        $form->company_id = auth()->user() ? auth()->user()->id:0;
        $form->form_name = $request->title;
        $form->save();

        //save field of form
        foreach($request->data as $index => $data){
            $field = new FormField();
            $field->form_id = $form->id;
            $field->field_label = $data['fieldlabel'];
            $field->field_type = $data['fieldtype'];
            if(isset($data['fieldoption'])){
                $resetIndexOpyion = array_values($data['fieldoption']);
                $field->field_option_json = json_encode($resetIndexOpyion);
            }
                
            $field->save();    
        }

        return redirect()->route('survey.index')->withStatus(__('Form Created'));

    }

    public function storeresult(Request $request)
    {
        $entry = new Entry();
        $entry->form_id = $request->form_id;
        $entry->entries_json = json_encode($request->data);
        $entry->save();
        //dd($_REQUEST);exit;

        return redirect()->route('survey.thanks');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surveys.create_survey');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($_REQUEST);
        //save new form
        $form = new Form();
        $form->company_id = auth()->user() ? auth()->user()->id:0;
        $form->form_name = $request->title;
        $form->save();

        //save field of form
        foreach($request->data as $index => $data){
            $field = new FormField();
            $field->form_id = $form->id;
            $field->field_label = $data['fieldlabel'];
            $field->field_type = $data['fieldtype'];
            if(isset($data['fieldoption'])){
                $resetIndexOpyion = array_values($data['fieldoption']);
                $field->field_option_json = json_encode($resetIndexOpyion);
            }
                
            $field->save();    
        }

        return redirect()->route('survey.index')->withStatus(__('Form Created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $forms = Form::where('company_id', auth()->user() ? auth()->user()->id:0);

        return view('surveys.index', ['forms' => $forms]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $form = Form::find($id)->delete();

        return redirect()->route('survey.index')->withErrors(__('Form Deleted'));
    }

    public function qr($id){
        return redirect('https://api.qrserver.com/v1/create-qr-code/?size=512x512&format=png&data='.route('survey.SurveyGeneratePage',$id));
    }

    public function entryShow($id){
        $form = Form::find($id);

        return view('surveys.entry', ['forms' => $form]);
    }
}
