<?php

namespace App\Mail;

use App\Models\ComOraleValide;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmationAbstract extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $abstract = DB::table('abstracts')->where('id', $this->id)->first();
        if ($abstract) {
            DB::table('abstracts')->where('id', $this->id)->update([
                'confirmation_abstract' => 1,
                'type_abstract'=> "Orale"
            ]);
            $comValide = ComOraleValide::create([
                'numero' => $abstract->id,
                'titre' => $abstract->titre,
                'email' => $abstract->email,
                'nom' => $abstract->name,
                
            ]);
        }
        $comValide = DB::table('com_orale_valides')->where('numero', $this->id)->first();
       
        return $this->view('email.abstract.confirmation-abstract', ['data'=>$abstract, 'com'=>$comValide]);
    }
}
