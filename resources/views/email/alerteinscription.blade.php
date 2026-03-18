<p>Nous avons un nouveau inscrit Nom : <strong> {{$data['name']}} </strong>, <br>
    Télephone <strong> {{$data['phone']}} </strong>,
    E-mail <strong> {{$data['mail']}} </strong>
    @if($data['charge']=="Oui")
    	@php
    		$verifie = DB::table('delegues')
                    ->where('id', $data['delegue'])->first();
            $labos = DB::table('laboratoires')
                    ->where('id', $data['labo'])->first();

    	@endphp
    	<br>
    	<span>Pris en charge par le délégué </span><strong> {{ !empty($verifie) ? $verifie->nom : '' }} </strong> <span>du laboratoire</span> <strong> {{ !empty($labos) ? $labos->labo : ""}} </strong>
    @else


    @endif
</p>