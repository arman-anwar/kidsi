<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function parser()
    {
        $path = storage_path() . "\\2020-01-02.json";

        $json = json_decode(file_get_contents($path), true);

        $data = [];
        foreach ($json as $game) {
            if (array_key_exists('attachments', $game)) {
                $data[$game['client_msg_id']] = array(
                    'client_msg_id' => $game['client_msg_id'],
                    'title' => $game['attachments'][0]['title'],
                    'image_url' => array_key_exists('image_url', $game['attachments'][0]) ? $game['attachments'][0]['image_url'] : null,
                    'title_link' => $game['attachments'][0]['title_link'],
                    'ts' => array_key_exists('ts', $game['attachments'][0]) ? $game['attachments'][0]['ts'] : null,
                );
            }
        }
        return $data;
    }

     public function index()
    {

        $data = $this->parser();
        return view('data.index')->with('members', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->parser();
        // var_dump( $data);
        Profile::truncate();
        Profile::insert($data);
        return redirect('parser')->with('flash_message', 'Data saved!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
