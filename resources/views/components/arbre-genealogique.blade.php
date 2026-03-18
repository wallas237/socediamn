@php

    $name = DB::table('compte_adherents')->where('matricule_compte', $matriculePied)->first();
    $soeTotal = DB::table('suivi_achat_produits')->where('matricule_compte', $matriculePied)->sum('montant');
    //on extrait le partie qui nous permet de savoir sa décendance
    $matricule = explode('000', $matriculePied);
    $soeCa = DB::table('suivi_achat_produits')
        ->where('matricule_compte', 'like', "%$matricule[0]%")
        ->sum('montant');
    $arbre = DB::table('arbres')->where('matricule_compte', $matriculePied)->first();
    $numeroGeneration = $arbre->generation - 1;
    
@endphp
<li>
    @if ($generation >= 1)
        <a href="#" title="{{ $numeroGeneration . ' Géneration' }}" class="{{ 'grade-' . $name->grade_id }}">
            {{ $name->compte_name }}
            <hr>
            {{ $name->code }}
            <hr>
            {{ 'VAP ' . $soeTotal }}

            {{ 'VAC : ' . $soeCa }}
        </a>
        {{--  Debut Deuxieme génération  --}}
        @if ($generation >= 2)
            @php
                $arbre2 = DB::table('arbres')->where('matricule_compte', $matriculePied)->first();
            @endphp
            @if (!empty($arbre2))

                <ul>
                    @if ($arbre2->matricule_pied_1 != null)
                        @php
                            $name2 = DB::table('compte_adherents')
                                ->where('matricule_compte', $arbre2->matricule_pied_1)
                                ->first();
                            $soeTotal2 = DB::table('suivi_achat_produits')
                                ->where('matricule_compte', $arbre2->matricule_pied_1)
                                ->sum('montant');
                            //on extrait le partie qui nous permet de savoir sa décendance
                            $matricule2 = explode('000', $arbre2->matricule_pied_1);
                            $soeCa2 = DB::table('suivi_achat_produits')
                                ->where('matricule_compte', 'like', "%$matricule2[0]%")
                                ->sum('montant');
                        @endphp
                        <li>
                            <a href="#" title="{{ $arbre2->generation . ' Géneration' }}"
                                class="{{ 'grade-' . $name2->grade_id }}">
                                {{ $name2->compte_name }}
                                <hr>
                                {{ $name2->code }}
                                <hr>
                                {{ 'VAP ' . $soeTotal2 }}

                                {{ 'VAC : ' . $soeCa2 }}
                            </a>
                            @if ($generation >= 3)
                                @php
                                    $arbre3 = DB::table('arbres')
                                        ->where('matricule_compte', $arbre2->matricule_pied_1)
                                        ->first();
                                @endphp
                                @if (!empty($arbre3))
                                    <ul>
                                        @if ($arbre3->matricule_pied_1 != null)
                                            @php
                                                $name3 = DB::table('compte_adherents')
                                                    ->where('matricule_compte', $arbre3->matricule_pied_1)
                                                    ->first();
                                                $soeTotal3 = DB::table('suivi_achat_produits')
                                                    ->where('matricule_compte', $arbre3->matricule_pied_1)
                                                    ->sum('montant');
                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                $matricule3 = explode('000', $arbre3->matricule_pied_1);
                                                $soeCa3 = DB::table('suivi_achat_produits')
                                                    ->where('matricule_compte', 'like', "%$matricule3[0]%")
                                                    ->sum('montant');
                                            @endphp
                                            <li>
                                                <a href="#" title="{{ $arbre3->generation . ' Géneration' }}"
                                                    class="{{ 'grade-' . $name3->grade_id }}">
                                                    {{ $name3->compte_name }}
                                                    <hr>
                                                    {{ $name3->code }}
                                                    <hr>
                                                    {{ 'VAP ' . $soeTotal3 }}

                                                    {{ 'VAC : ' . $soeCa3 }}
                                                </a>
                                                @if ($generation >= 4)
                                                    @php
                                                        $arbre4 = DB::table('arbres')
                                                            ->where('matricule_compte', $arbre3->matricule_pied_1)
                                                            ->first();
                                                    @endphp
                                                    @if (!empty($arbre4))
                                                        <ul>
                                                            @if ($arbre4->matricule_pied_1 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_1,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_1,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_1,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if ($arbre4->matricule_pied_2 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_2,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_2,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_2,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if ($arbre4->matricule_pied_3 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_3,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_3,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_3,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    @endif
                                                @endif
                                            </li>
                                        @endif

                                        @if ($arbre3->matricule_pied_2 != null)
                                            @php
                                                $name3 = DB::table('compte_adherents')
                                                    ->where('matricule_compte', $arbre3->matricule_pied_2)
                                                    ->first();
                                                $soeTotal3 = DB::table('suivi_achat_produits')
                                                    ->where('matricule_compte', $arbre3->matricule_pied_2)
                                                    ->sum('montant');
                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                $matricule3 = explode('000', $arbre3->matricule_pied_2);
                                                $soeCa3 = DB::table('suivi_achat_produits')
                                                    ->where('matricule_compte', 'like', "%$matricule3[0]%")
                                                    ->sum('montant');
                                            @endphp
                                            <li>
                                                <a href="#" title="{{ $arbre3->generation . ' Géneration' }}"
                                                    class="{{ 'grade-' . $name3->grade_id }}">
                                                    {{ $name3->compte_name }}
                                                    <hr>
                                                    {{ $name3->code }}
                                                    <hr>
                                                    {{ 'VAP ' . $soeTotal3 }}

                                                    {{ 'VAC : ' . $soeCa3 }}
                                                </a>
                                                @php
                                                    $arbre4 = DB::table('arbres')
                                                        ->where('matricule_compte', $arbre3->matricule_pied_2)
                                                        ->first();
                                                @endphp
                                                @if (!empty($arbre4))
                                                    <ul>
                                                        @if ($arbre4->matricule_pied_1 != null)
                                                            @php
                                                                $name4 = DB::table('compte_adherents')
                                                                    ->where(
                                                                        'matricule_compte',
                                                                        $arbre4->matricule_pied_1,
                                                                    )
                                                                    ->first();
                                                                $soeTotal4 = DB::table('suivi_achat_produits')
                                                                    ->where(
                                                                        'matricule_compte',
                                                                        $arbre4->matricule_pied_1,
                                                                    )
                                                                    ->sum('montant');
                                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                                $matricule4 = explode('000', $arbre4->matricule_pied_1);
                                                                $soeCa4 = DB::table('suivi_achat_produits')
                                                                    ->where(
                                                                        'matricule_compte',
                                                                        'like',
                                                                        "%$matricule4[0]%",
                                                                    )
                                                                    ->sum('montant');
                                                            @endphp
                                                            <li>
                                                                <a href="#"
                                                                    title="{{ $arbre4->generation . ' Géneration' }}"
                                                                    class="{{ 'grade-' . $name4->grade_id }}">
                                                                    {{ $name4->compte_name }}
                                                                    <hr>
                                                                    {{ $name4->code }}
                                                                    <hr>
                                                                    {{ 'VAP ' . $soeTotal4 }}

                                                                    {{ 'VAC : ' . $soeCa4 }}
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if ($arbre4->matricule_pied_2 != null)
                                                            @php
                                                                $name4 = DB::table('compte_adherents')
                                                                    ->where(
                                                                        'matricule_compte',
                                                                        $arbre4->matricule_pied_2,
                                                                    )
                                                                    ->first();
                                                                $soeTotal4 = DB::table('suivi_achat_produits')
                                                                    ->where(
                                                                        'matricule_compte',
                                                                        $arbre4->matricule_pied_2,
                                                                    )
                                                                    ->sum('montant');
                                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                                $matricule4 = explode('000', $arbre4->matricule_pied_2);
                                                                $soeCa4 = DB::table('suivi_achat_produits')
                                                                    ->where(
                                                                        'matricule_compte',
                                                                        'like',
                                                                        "%$matricule4[0]%",
                                                                    )
                                                                    ->sum('montant');
                                                            @endphp
                                                            <li>
                                                                <a href="#"
                                                                    title="{{ $arbre4->generation . ' Géneration' }}"
                                                                    class="{{ 'grade-' . $name4->grade_id }}">
                                                                    {{ $name4->compte_name }}
                                                                    <hr>
                                                                    {{ $name4->code }}
                                                                    <hr>
                                                                    {{ 'VAP ' . $soeTotal4 }}

                                                                    {{ 'VAC : ' . $soeCa4 }}
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if ($arbre4->matricule_pied_3 != null)
                                                            @php
                                                                $name4 = DB::table('compte_adherents')
                                                                    ->where(
                                                                        'matricule_compte',
                                                                        $arbre4->matricule_pied_3,
                                                                    )
                                                                    ->first();
                                                                $soeTotal4 = DB::table('suivi_achat_produits')
                                                                    ->where(
                                                                        'matricule_compte',
                                                                        $arbre4->matricule_pied_3,
                                                                    )
                                                                    ->sum('montant');
                                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                                $matricule4 = explode('000', $arbre4->matricule_pied_3);
                                                                $soeCa4 = DB::table('suivi_achat_produits')
                                                                    ->where(
                                                                        'matricule_compte',
                                                                        'like',
                                                                        "%$matricule4[0]%",
                                                                    )
                                                                    ->sum('montant');
                                                            @endphp
                                                            <li>
                                                                <a href="#"
                                                                    title="{{ $arbre4->generation . ' Géneration' }}"
                                                                    class="{{ 'grade-' . $name4->grade_id }}">
                                                                    {{ $name4->compte_name }}
                                                                    <hr>
                                                                    {{ $name4->code }}
                                                                    <hr>
                                                                    {{ 'VAP ' . $soeTotal4 }}

                                                                    {{ 'VAC : ' . $soeCa4 }}
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                @endif
                                            </li>
                                        @endif

                                        @if ($arbre3->matricule_pied_3 != null)
                                            @php
                                                $name3 = DB::table('compte_adherents')
                                                    ->where('matricule_compte', $arbre3->matricule_pied_3)
                                                    ->first();
                                                $soeTotal3 = DB::table('suivi_achat_produits')
                                                    ->where('matricule_compte', $arbre3->matricule_pied_3)
                                                    ->sum('montant');
                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                $matricule3 = explode('000', $arbre3->matricule_pied_3);
                                                $soeCa3 = DB::table('suivi_achat_produits')
                                                    ->where('matricule_compte', 'like', "%$matricule3[0]%")
                                                    ->sum('montant');
                                            @endphp
                                            <li>
                                                <a href="#" title="{{ $arbre3->generation . ' Géneration' }}"
                                                    class="{{ 'grade-' . $name3->grade_id }}">
                                                    {{ $name3->compte_name }}
                                                    <hr>
                                                    {{ $name3->code }}
                                                    <hr>
                                                    {{ 'VAP ' . $soeTotal3 }}

                                                    {{ 'VAC : ' . $soeCa3 }}
                                                </a>
                                                @php
                                                    $arbre4 = DB::table('arbres')
                                                        ->where('matricule_compte', $arbre3->matricule_pied_3)
                                                        ->first();
                                                @endphp
                                                @if (!empty($arbre4))
                                                    <ul>
                                                        @if ($arbre4->matricule_pied_1 != null)
                                                            @php
                                                                $name4 = DB::table('compte_adherents')
                                                                    ->where(
                                                                        'matricule_compte',
                                                                        $arbre4->matricule_pied_1,
                                                                    )
                                                                    ->first();
                                                                $soeTotal4 = DB::table('suivi_achat_produits')
                                                                    ->where(
                                                                        'matricule_compte',
                                                                        $arbre4->matricule_pied_1,
                                                                    )
                                                                    ->sum('montant');
                                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                                $matricule4 = explode('000', $arbre4->matricule_pied_1);
                                                                $soeCa4 = DB::table('suivi_achat_produits')
                                                                    ->where(
                                                                        'matricule_compte',
                                                                        'like',
                                                                        "%$matricule4[0]%",
                                                                    )
                                                                    ->sum('montant');
                                                            @endphp
                                                            <li>
                                                                <a href="#"
                                                                    title="{{ $arbre4->generation . ' Géneration' }}"
                                                                    class="{{ 'grade-' . $name4->grade_id }}">
                                                                    {{ $name4->compte_name }}
                                                                    <hr>
                                                                    {{ $name4->code }}
                                                                    <hr>
                                                                    {{ 'VAP ' . $soeTotal4 }}

                                                                    {{ 'VAC : ' . $soeCa4 }}
                                                                </a>
                                                                @php
                                                                    $arbre5 = DB::table('arbres')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_1,
                                                                        )
                                                                        ->first();
                                                                @endphp
                                                                @if (!empty($arbre5))
                                                                    <ul>

                                                                        @if ($arbre5->matricule_pied_1 != null)
                                                                            @php
                                                                                $name5 = DB::table('compte_adherents')
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        $arbre5->matricule_pied_1,
                                                                                    )
                                                                                    ->first();
                                                                                $soeTotal5 = DB::table(
                                                                                    'suivi_achat_produits',
                                                                                )
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        $arbre5->matricule_pied_1,
                                                                                    )
                                                                                    ->sum('montant');
                                                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                                                $matricule5 = explode(
                                                                                    '000',
                                                                                    $arbre5->matricule_pied_1,
                                                                                );
                                                                                $soeCa5 = DB::table(
                                                                                    'suivi_achat_produits',
                                                                                )
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        'like',
                                                                                        "%$matricule5[0]%",
                                                                                    )
                                                                                    ->sum('montant');
                                                                            @endphp
                                                                            <li>
                                                                                <a href="#"
                                                                                    title="{{ $arbre5->generation . ' Géneration' }}"
                                                                                    class="{{ 'grade-' . $name5->grade_id }}">
                                                                                    {{ $name5->compte_name }}
                                                                                    <hr>
                                                                                    {{ $name5->code }}
                                                                                    <hr>
                                                                                    {{ 'VAP ' . $soeTotal5 }}

                                                                                    {{ 'VAC : ' . $soeCa5 }}
                                                                                </a>
                                                                            </li>
                                                                        @endif
                                                                        @if ($arbre5->matricule_pied_2 != null)
                                                                            @php
                                                                                $name5 = DB::table('compte_adherents')
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        $arbre5->matricule_pied_2,
                                                                                    )
                                                                                    ->first();
                                                                                $soeTotal5 = DB::table(
                                                                                    'suivi_achat_produits',
                                                                                )
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        $arbre5->matricule_pied_2,
                                                                                    )
                                                                                    ->sum('montant');
                                                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                                                $matricule5 = explode(
                                                                                    '000',
                                                                                    $arbre5->matricule_pied_2,
                                                                                );
                                                                                $soeCa5 = DB::table(
                                                                                    'suivi_achat_produits',
                                                                                )
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        'like',
                                                                                        "%$matricule5[0]%",
                                                                                    )
                                                                                    ->sum('montant');
                                                                            @endphp
                                                                            <li>
                                                                                <a href="#"
                                                                                    title="{{ $arbre5->generation . ' Géneration' }}"
                                                                                    class="{{ 'grade-' . $name5->grade_id }}">
                                                                                    {{ $name5->compte_name }}
                                                                                    <hr>
                                                                                    {{ $name5->code }}
                                                                                    <hr>
                                                                                    {{ 'VAP ' . $soeTotal5 }}

                                                                                    {{ 'VAC : ' . $soeCa5 }}
                                                                                </a>
                                                                            </li>
                                                                        @endif
                                                                        @if ($arbre5->matricule_pied_3 != null)
                                                                            @php
                                                                                $name5 = DB::table('compte_adherents')
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        $arbre5->matricule_pied_3,
                                                                                    )
                                                                                    ->first();
                                                                                $soeTotal5 = DB::table(
                                                                                    'suivi_achat_produits',
                                                                                )
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        $arbre5->matricule_pied_3,
                                                                                    )
                                                                                    ->sum('montant');
                                                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                                                $matricule5 = explode(
                                                                                    '000',
                                                                                    $arbre5->matricule_pied_3,
                                                                                );
                                                                                $soeCa5 = DB::table(
                                                                                    'suivi_achat_produits',
                                                                                )
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        'like',
                                                                                        "%$matricule5[0]%",
                                                                                    )
                                                                                    ->sum('montant');
                                                                            @endphp
                                                                            <li>
                                                                                <a href="#"
                                                                                    title="{{ $arbre5->generation . ' Géneration' }}"
                                                                                    class="{{ 'grade-' . $name5->grade_id }}">
                                                                                    {{ $name5->compte_name }}
                                                                                    <hr>
                                                                                    {{ $name5->code }}
                                                                                    <hr>
                                                                                    {{ 'VAP ' . $soeTotal5 }}

                                                                                    {{ 'VAC : ' . $soeCa5 }}
                                                                                </a>
                                                                            </li>
                                                                        @endif
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endif
                                                        @if ($arbre4->matricule_pied_2 != null)
                                                            @php
                                                                $name4 = DB::table('compte_adherents')
                                                                    ->where(
                                                                        'matricule_compte',
                                                                        $arbre4->matricule_pied_2,
                                                                    )
                                                                    ->first();
                                                                $soeTotal4 = DB::table('suivi_achat_produits')
                                                                    ->where(
                                                                        'matricule_compte',
                                                                        $arbre4->matricule_pied_2,
                                                                    )
                                                                    ->sum('montant');
                                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                                $matricule4 = explode('000', $arbre4->matricule_pied_2);
                                                                $soeCa4 = DB::table('suivi_achat_produits')
                                                                    ->where(
                                                                        'matricule_compte',
                                                                        'like',
                                                                        "%$matricule4[0]%",
                                                                    )
                                                                    ->sum('montant');
                                                            @endphp
                                                            <li>
                                                                <a href="#"
                                                                    title="{{ $arbre4->generation . ' Géneration' }}"
                                                                    class="{{ 'grade-' . $name4->grade_id }}">
                                                                    {{ $name4->compte_name }}
                                                                    <hr>
                                                                    {{ $name4->code }}
                                                                    <hr>
                                                                    {{ 'VAP ' . $soeTotal4 }}

                                                                    {{ 'VAC : ' . $soeCa4 }}
                                                                </a>
                                                                @php
                                                                    $arbre5 = DB::table('arbres')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_2,
                                                                        )
                                                                        ->first();
                                                                @endphp
                                                                @if (!empty($arbre5))
                                                                    <ul>

                                                                        @if ($arbre5->matricule_pied_1 != null)
                                                                            @php
                                                                                $name5 = DB::table('compte_adherents')
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        $arbre5->matricule_pied_1,
                                                                                    )
                                                                                    ->first();
                                                                                $soeTotal5 = DB::table(
                                                                                    'suivi_achat_produits',
                                                                                )
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        $arbre5->matricule_pied_1,
                                                                                    )
                                                                                    ->sum('montant');
                                                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                                                $matricule5 = explode(
                                                                                    '000',
                                                                                    $arbre5->matricule_pied_1,
                                                                                );
                                                                                $soeCa5 = DB::table(
                                                                                    'suivi_achat_produits',
                                                                                )
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        'like',
                                                                                        "%$matricule5[0]%",
                                                                                    )
                                                                                    ->sum('montant');
                                                                            @endphp
                                                                            <li>
                                                                                <a href="#"
                                                                                    title="{{ $arbre5->generation . ' Géneration' }}"
                                                                                    class="{{ 'grade-' . $name5->grade_id }}">
                                                                                    {{ $name5->compte_name }}
                                                                                    <hr>
                                                                                    {{ $name5->code }}
                                                                                    <hr>
                                                                                    {{ 'VAP ' . $soeTotal5 }}

                                                                                    {{ 'VAC : ' . $soeCa5 }}
                                                                                </a>
                                                                            </li>
                                                                        @endif
                                                                        @if ($arbre5->matricule_pied_2 != null)
                                                                            @php
                                                                                $name5 = DB::table('compte_adherents')
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        $arbre5->matricule_pied_2,
                                                                                    )
                                                                                    ->first();
                                                                                $soeTotal5 = DB::table(
                                                                                    'suivi_achat_produits',
                                                                                )
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        $arbre5->matricule_pied_2,
                                                                                    )
                                                                                    ->sum('montant');
                                                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                                                $matricule5 = explode(
                                                                                    '000',
                                                                                    $arbre5->matricule_pied_2,
                                                                                );
                                                                                $soeCa5 = DB::table(
                                                                                    'suivi_achat_produits',
                                                                                )
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        'like',
                                                                                        "%$matricule5[0]%",
                                                                                    )
                                                                                    ->sum('montant');
                                                                            @endphp
                                                                            <li>
                                                                                <a href="#"
                                                                                    title="{{ $arbre5->generation . ' Géneration' }}"
                                                                                    class="{{ 'grade-' . $name5->grade_id }}">
                                                                                    {{ $name5->compte_name }}
                                                                                    <hr>
                                                                                    {{ $name5->code }}
                                                                                    <hr>
                                                                                    {{ 'VAP ' . $soeTotal5 }}

                                                                                    {{ 'VAC : ' . $soeCa5 }}
                                                                                </a>
                                                                            </li>
                                                                        @endif
                                                                        @if ($arbre5->matricule_pied_3 != null)
                                                                            @php
                                                                                $name5 = DB::table('compte_adherents')
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        $arbre5->matricule_pied_3,
                                                                                    )
                                                                                    ->first();
                                                                                $soeTotal5 = DB::table(
                                                                                    'suivi_achat_produits',
                                                                                )
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        $arbre5->matricule_pied_3,
                                                                                    )
                                                                                    ->sum('montant');
                                                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                                                $matricule5 = explode(
                                                                                    '000',
                                                                                    $arbre5->matricule_pied_3,
                                                                                );
                                                                                $soeCa5 = DB::table(
                                                                                    'suivi_achat_produits',
                                                                                )
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        'like',
                                                                                        "%$matricule5[0]%",
                                                                                    )
                                                                                    ->sum('montant');
                                                                            @endphp
                                                                            <li>
                                                                                <a href="#"
                                                                                    title="{{ $arbre5->generation . ' Géneration' }}"
                                                                                    class="{{ 'grade-' . $name5->grade_id }}">
                                                                                    {{ $name5->compte_name }}
                                                                                    <hr>
                                                                                    {{ $name5->code }}
                                                                                    <hr>
                                                                                    {{ 'VAP ' . $soeTotal5 }}

                                                                                    {{ 'VAC : ' . $soeCa5 }}
                                                                                </a>
                                                                            </li>
                                                                        @endif
                                                                    </ul>
                                                                @endif

                                                            </li>
                                                        @endif
                                                        @if ($arbre4->matricule_pied_3 != null)
                                                            @php
                                                                $name4 = DB::table('compte_adherents')
                                                                    ->where(
                                                                        'matricule_compte',
                                                                        $arbre4->matricule_pied_3,
                                                                    )
                                                                    ->first();
                                                                $soeTotal4 = DB::table('suivi_achat_produits')
                                                                    ->where(
                                                                        'matricule_compte',
                                                                        $arbre4->matricule_pied_3,
                                                                    )
                                                                    ->sum('montant');
                                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                                $matricule4 = explode('000', $arbre4->matricule_pied_3);
                                                                $soeCa4 = DB::table('suivi_achat_produits')
                                                                    ->where(
                                                                        'matricule_compte',
                                                                        'like',
                                                                        "%$matricule4[0]%",
                                                                    )
                                                                    ->sum('montant');
                                                            @endphp
                                                            <li>
                                                                <a href="#"
                                                                    title="{{ $arbre4->generation . ' Géneration' }}"
                                                                    class="{{ 'grade-' . $name4->grade_id }}">
                                                                    {{ $name4->compte_name }}
                                                                    <hr>
                                                                    {{ $name4->code }}
                                                                    <hr>
                                                                    {{ 'VAP ' . $soeTotal4 }}

                                                                    {{ 'VAC : ' . $soeCa4 }}
                                                                </a>
                                                                @php
                                                                    $arbre5 = DB::table('arbres')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_3,
                                                                        )
                                                                        ->first();
                                                                @endphp
                                                                @if (!empty($arbre5))
                                                                    <ul>

                                                                        @if ($arbre5->matricule_pied_1 != null)
                                                                            @php
                                                                                $name5 = DB::table('compte_adherents')
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        $arbre5->matricule_pied_1,
                                                                                    )
                                                                                    ->first();
                                                                                $soeTotal5 = DB::table(
                                                                                    'suivi_achat_produits',
                                                                                )
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        $arbre5->matricule_pied_1,
                                                                                    )
                                                                                    ->sum('montant');
                                                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                                                $matricule5 = explode(
                                                                                    '000',
                                                                                    $arbre5->matricule_pied_1,
                                                                                );
                                                                                $soeCa5 = DB::table(
                                                                                    'suivi_achat_produits',
                                                                                )
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        'like',
                                                                                        "%$matricule5[0]%",
                                                                                    )
                                                                                    ->sum('montant');
                                                                            @endphp
                                                                            <li>
                                                                                <a href="#"
                                                                                    title="{{ $arbre5->generation . ' Géneration' }}"
                                                                                    class="{{ 'grade-' . $name5->grade_id }}">
                                                                                    {{ $name5->compte_name }}
                                                                                    <hr>
                                                                                    {{ $name5->code }}
                                                                                    <hr>
                                                                                    {{ 'VAP ' . $soeTotal5 }}

                                                                                    {{ 'VAC : ' . $soeCa5 }}
                                                                                </a>
                                                                            </li>
                                                                        @endif
                                                                        @if ($arbre5->matricule_pied_2 != null)
                                                                            @php
                                                                                $name5 = DB::table('compte_adherents')
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        $arbre5->matricule_pied_2,
                                                                                    )
                                                                                    ->first();
                                                                                $soeTotal5 = DB::table(
                                                                                    'suivi_achat_produits',
                                                                                )
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        $arbre5->matricule_pied_2,
                                                                                    )
                                                                                    ->sum('montant');
                                                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                                                $matricule5 = explode(
                                                                                    '000',
                                                                                    $arbre5->matricule_pied_2,
                                                                                );
                                                                                $soeCa5 = DB::table(
                                                                                    'suivi_achat_produits',
                                                                                )
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        'like',
                                                                                        "%$matricule5[0]%",
                                                                                    )
                                                                                    ->sum('montant');
                                                                            @endphp
                                                                            <li>
                                                                                <a href="#"
                                                                                    title="{{ $arbre5->generation . ' Géneration' }}"
                                                                                    class="{{ 'grade-' . $name5->grade_id }}">
                                                                                    {{ $name5->compte_name }}
                                                                                    <hr>
                                                                                    {{ $name5->code }}
                                                                                    <hr>
                                                                                    {{ 'VAP ' . $soeTotal5 }}

                                                                                    {{ 'VAC : ' . $soeCa5 }}
                                                                                </a>
                                                                            </li>
                                                                        @endif
                                                                        @if ($arbre5->matricule_pied_3 != null)
                                                                            @php
                                                                                $name5 = DB::table('compte_adherents')
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        $arbre5->matricule_pied_3,
                                                                                    )
                                                                                    ->first();
                                                                                $soeTotal5 = DB::table(
                                                                                    'suivi_achat_produits',
                                                                                )
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        $arbre5->matricule_pied_3,
                                                                                    )
                                                                                    ->sum('montant');
                                                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                                                $matricule5 = explode(
                                                                                    '000',
                                                                                    $arbre5->matricule_pied_3,
                                                                                );
                                                                                $soeCa5 = DB::table(
                                                                                    'suivi_achat_produits',
                                                                                )
                                                                                    ->where(
                                                                                        'matricule_compte',
                                                                                        'like',
                                                                                        "%$matricule5[0]%",
                                                                                    )
                                                                                    ->sum('montant');
                                                                            @endphp
                                                                            <li>
                                                                                <a href="#"
                                                                                    title="{{ $arbre5->generation . ' Géneration' }}"
                                                                                    class="{{ 'grade-' . $name5->grade_id }}">
                                                                                    {{ $name5->compte_name }}
                                                                                    <hr>
                                                                                    {{ $name5->code }}
                                                                                    <hr>
                                                                                    {{ 'VAP ' . $soeTotal5 }}

                                                                                    {{ 'VAC : ' . $soeCa5 }}
                                                                                </a>
                                                                            </li>
                                                                        @endif
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endif
                                                    </ul>
                                                @endif
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            @endif
                        </li>
                    @endif
                    @if ($arbre2->matricule_pied_2 != null)
                        @php
                            $name2 = DB::table('compte_adherents')
                                ->where('matricule_compte', $arbre2->matricule_pied_2)
                                ->first();
                            $soeTotal2 = DB::table('suivi_achat_produits')
                                ->where('matricule_compte', $arbre2->matricule_pied_2)
                                ->sum('montant');
                            //on extrait le partie qui nous permet de savoir sa décendance
                            $matricule2 = explode('000', $arbre2->matricule_pied_2);
                            $soeCa2 = DB::table('suivi_achat_produits')
                                ->where('matricule_compte', 'like', "%$matricule2[0]%")
                                ->sum('montant');
                        @endphp
                        <li>
                            <a href="#" title="{{ $arbre2->generation . ' Géneration' }}"
                                class="{{ 'grade-' . $name2->grade_id }}">
                                {{ $name2->compte_name }}
                                <hr>
                                {{ $name2->code }}
                                <hr>
                                {{ 'VAP ' . $soeTotal2 }}

                                {{ 'VAC : ' . $soeCa2 }}
                            </a>
                            @if ($generation >= 3)
                                @php
                                    $arbre3 = DB::table('arbres')
                                        ->where('matricule_compte', $arbre2->matricule_pied_2)
                                        ->first();
                                @endphp
                                @if (!empty($arbre3))
                                    <ul>
                                        @if ($arbre3->matricule_pied_1 != null)
                                            @php
                                                $name3 = DB::table('compte_adherents')
                                                    ->where('matricule_compte', $arbre3->matricule_pied_1)
                                                    ->first();
                                                $soeTotal3 = DB::table('suivi_achat_produits')
                                                    ->where('matricule_compte', $arbre3->matricule_pied_1)
                                                    ->sum('montant');
                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                $matricule3 = explode('000', $arbre3->matricule_pied_1);
                                                $soeCa3 = DB::table('suivi_achat_produits')
                                                    ->where('matricule_compte', 'like', "%$matricule3[0]%")
                                                    ->sum('montant');
                                            @endphp
                                            <li>
                                                <a href="#" title="{{ $arbre3->generation . ' Géneration' }}"
                                                    class="{{ 'grade-' . $name3->grade_id }}">
                                                    {{ $name3->compte_name }}
                                                    <hr>
                                                    {{ $name3->code }}
                                                    <hr>
                                                    {{ 'VAP ' . $soeTotal3 }}

                                                    {{ 'VAC : ' . $soeCa3 }}
                                                </a>
                                                @if ($generation >= 4)
                                                    @php
                                                        $arbre4 = DB::table('arbres')
                                                            ->where('matricule_compte', $arbre3->matricule_pied_1)
                                                            ->first();
                                                    @endphp
                                                    @if (!empty($arbre4))
                                                        <ul>
                                                            @if ($arbre4->matricule_pied_1 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_1,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_1,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_1,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if ($arbre4->matricule_pied_2 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_2,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_2,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_2,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if ($arbre4->matricule_pied_3 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_3,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_3,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_3,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    @endif
                                                @endif
                                            </li>
                                        @endif

                                        @if ($arbre3->matricule_pied_2 != null)
                                            @php
                                                $name3 = DB::table('compte_adherents')
                                                    ->where('matricule_compte', $arbre3->matricule_pied_2)
                                                    ->first();
                                                $soeTotal3 = DB::table('suivi_achat_produits')
                                                    ->where('matricule_compte', $arbre3->matricule_pied_2)
                                                    ->sum('montant');
                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                $matricule3 = explode('000', $arbre3->matricule_pied_2);
                                                $soeCa3 = DB::table('suivi_achat_produits')
                                                    ->where('matricule_compte', 'like', "%$matricule3[0]%")
                                                    ->sum('montant');
                                            @endphp
                                            <li>
                                                <a href="#" title="{{ $arbre3->generation . ' Géneration' }}"
                                                    class="{{ 'grade-' . $name3->grade_id }}">
                                                    {{ $name3->compte_name }}
                                                    <hr>
                                                    {{ $name3->code }}
                                                    <hr>
                                                    {{ 'VAP ' . $soeTotal3 }}

                                                    {{ 'VAC : ' . $soeCa3 }}
                                                </a>
                                                @if ($generation >= 4)
                                                    @php
                                                        $arbre4 = DB::table('arbres')
                                                            ->where('matricule_compte', $arbre3->matricule_pied_2)
                                                            ->first();
                                                    @endphp
                                                    @if (!empty($arbre4))
                                                        <ul>
                                                            @if ($arbre4->matricule_pied_1 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_1,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_1,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_1,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if ($arbre4->matricule_pied_2 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_2,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_2,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_2,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if ($arbre4->matricule_pied_3 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_3,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_3,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_3,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    @endif
                                                @endif
                                            </li>
                                        @endif

                                        @if ($arbre3->matricule_pied_3 != null)
                                            @php
                                                $name3 = DB::table('compte_adherents')
                                                    ->where('matricule_compte', $arbre3->matricule_pied_3)
                                                    ->first();
                                                $soeTotal3 = DB::table('suivi_achat_produits')
                                                    ->where('matricule_compte', $arbre3->matricule_pied_3)
                                                    ->sum('montant');
                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                $matricule3 = explode('000', $arbre3->matricule_pied_3);
                                                $soeCa3 = DB::table('suivi_achat_produits')
                                                    ->where('matricule_compte', 'like', "%$matricule3[0]%")
                                                    ->sum('montant');
                                            @endphp
                                            <li>
                                                <a href="#" title="{{ $arbre3->generation . ' Géneration' }}"
                                                    class="{{ 'grade-' . $name3->grade_id }}">
                                                    {{ $name3->compte_name }}
                                                    <hr>
                                                    {{ $name3->code }}
                                                    <hr>
                                                    {{ 'VAP ' . $soeTotal3 }}

                                                    {{ 'VAC : ' . $soeCa3 }}
                                                </a>
                                                @if ($generation >= 4)
                                                    @php
                                                        $arbre4 = DB::table('arbres')
                                                            ->where('matricule_compte', $arbre3->matricule_pied_3)
                                                            ->first();
                                                    @endphp
                                                    @if (!empty($arbre4))
                                                        <ul>
                                                            @if ($arbre4->matricule_pied_1 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_1,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_1,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_1,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if ($arbre4->matricule_pied_2 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_2,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_2,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_2,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if ($arbre4->matricule_pied_3 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_3,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_3,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_3,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    @endif
                                                @endif
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            @endif
                        </li>
                    @endif
                    @if ($arbre2->matricule_pied_3 != null)
                        @php
                            $name2 = DB::table('compte_adherents')
                                ->where('matricule_compte', $arbre2->matricule_pied_3)
                                ->first();
                            $soeTotal2 = DB::table('suivi_achat_produits')
                                ->where('matricule_compte', $arbre2->matricule_pied_3)
                                ->sum('montant');
                            //on extrait le partie qui nous permet de savoir sa décendance
                            $matricule2 = explode('000', $arbre2->matricule_pied_3);
                            $soeCa2 = DB::table('suivi_achat_produits')
                                ->where('matricule_compte', 'like', "%$matricule2[0]%")
                                ->sum('montant');
                        @endphp

                        <li><a href="#" title="{{ $arbre2->generation . ' Géneration' }}"
                                class="{{ 'grade-' . $name2->grade_id }}">
                                {{ $name2->compte_name }}
                                <hr>
                                {{ $name2->code }}
                                <hr>
                                {{ 'VAP ' . $soeTotal2 }}

                                {{ 'VAC : ' . $soeCa2 }}
                            </a>
                            @if ($generation >= 3)
                                @php
                                    $arbre3 = DB::table('arbres')
                                        ->where('matricule_compte', $arbre2->matricule_pied_3)
                                        ->first();
                                @endphp
                                @if (!empty($arbre3))
                                    <ul>
                                        @if ($arbre3->matricule_pied_1 != null)
                                            @php
                                                $name3 = DB::table('compte_adherents')
                                                    ->where('matricule_compte', $arbre3->matricule_pied_1)
                                                    ->first();
                                                $soeTotal3 = DB::table('suivi_achat_produits')
                                                    ->where('matricule_compte', $arbre3->matricule_pied_1)
                                                    ->sum('montant');
                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                $matricule3 = explode('000', $arbre3->matricule_pied_1);
                                                $soeCa3 = DB::table('suivi_achat_produits')
                                                    ->where('matricule_compte', 'like', "%$matricule3[0]%")
                                                    ->sum('montant');
                                            @endphp
                                            <li>
                                                <a href="#" title="{{ $arbre3->generation . ' Géneration' }}"
                                                    class="{{ 'grade-' . $name3->grade_id }}">
                                                    {{ $name3->compte_name }}
                                                    <hr>
                                                    {{ $name3->code }}
                                                    <hr>
                                                    {{ 'VAP ' . $soeTotal3 }}

                                                    {{ 'VAC : ' . $soeCa3 }}
                                                </a>
                                                @if ($generation >= 4)
                                                    @php
                                                        $arbre4 = DB::table('arbres')
                                                            ->where('matricule_compte', $arbre3->matricule_pied_1)
                                                            ->first();
                                                    @endphp
                                                    @if (!empty($arbre4))
                                                        <ul>
                                                            @if ($arbre4->matricule_pied_1 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_1,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_1,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_1,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if ($arbre4->matricule_pied_2 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_2,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_2,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_2,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if ($arbre4->matricule_pied_3 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_3,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_3,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_3,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    @endif
                                                @endif
                                            </li>
                                        @endif

                                        @if ($arbre3->matricule_pied_2 != null)
                                            @php
                                                $name3 = DB::table('compte_adherents')
                                                    ->where('matricule_compte', $arbre3->matricule_pied_2)
                                                    ->first();
                                                $soeTotal3 = DB::table('suivi_achat_produits')
                                                    ->where('matricule_compte', $arbre3->matricule_pied_2)
                                                    ->sum('montant');
                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                $matricule3 = explode('000', $arbre3->matricule_pied_2);
                                                $soeCa3 = DB::table('suivi_achat_produits')
                                                    ->where('matricule_compte', 'like', "%$matricule3[0]%")
                                                    ->sum('montant');
                                            @endphp
                                            <li>
                                                <a href="#" title="{{ $arbre3->generation . ' Géneration' }}"
                                                    class="{{ 'grade-' . $name3->grade_id }}">
                                                    {{ $name3->compte_name }}
                                                    <hr>
                                                    {{ $name3->code }}
                                                    <hr>
                                                    {{ 'VAP ' . $soeTotal3 }}

                                                    {{ 'VAC : ' . $soeCa3 }}
                                                </a>
                                                @php
                                                    $arbre4 = DB::table('arbres')
                                                        ->where('matricule_compte', $arbre3->matricule_pied_2)
                                                        ->first();
                                                @endphp
                                                @if ($generation >= 4)
                                                    @if (!empty($arbre4))
                                                        <ul>
                                                            @if ($arbre4->matricule_pied_1 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_1,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_1,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_1,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if ($arbre4->matricule_pied_2 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_2,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_2,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_2,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if ($arbre4->matricule_pied_3 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_3,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_3,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_3,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    @endif
                                                @endif
                                            </li>
                                        @endif

                                        @if ($arbre3->matricule_pied_3 != null)
                                            @php
                                                $name3 = DB::table('compte_adherents')
                                                    ->where('matricule_compte', $arbre3->matricule_pied_3)
                                                    ->first();
                                                $soeTotal3 = DB::table('suivi_achat_produits')
                                                    ->where('matricule_compte', $arbre3->matricule_pied_3)
                                                    ->sum('montant');
                                                //on extrait le partie qui nous permet de savoir sa décendance
                                                $matricule3 = explode('000', $arbre3->matricule_pied_3);
                                                $soeCa3 = DB::table('suivi_achat_produits')
                                                    ->where('matricule_compte', 'like', "%$matricule3[0]%")
                                                    ->sum('montant');
                                            @endphp
                                            <li>
                                                <a href="#" title="{{ $arbre3->generation . ' Géneration' }}"
                                                    class="{{ 'grade-' . $name3->grade_id }}">
                                                    {{ $name3->compte_name }}
                                                    <hr>
                                                    {{ $name3->code }}
                                                    <hr>
                                                    {{ 'VAP ' . $soeTotal3 }}

                                                    {{ 'VAC : ' . $soeCa3 }}
                                                </a>
                                                @if ($generation >= 4)
                                                    @php
                                                        $arbre4 = DB::table('arbres')
                                                            ->where('matricule_compte', $arbre3->matricule_pied_3)
                                                            ->first();
                                                    @endphp
                                                    @if (!empty($arbre4))
                                                        <ul>
                                                            @if ($arbre4->matricule_pied_1 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_1,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_1,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_1,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if ($arbre4->matricule_pied_2 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_2,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_2,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_2,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if ($arbre4->matricule_pied_3 != null)
                                                                @php
                                                                    $name4 = DB::table('compte_adherents')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_3,
                                                                        )
                                                                        ->first();
                                                                    $soeTotal4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            $arbre4->matricule_pied_3,
                                                                        )
                                                                        ->sum('montant');
                                                                    //on extrait le partie qui nous permet de savoir sa décendance
                                                                    $matricule4 = explode(
                                                                        '000',
                                                                        $arbre4->matricule_pied_3,
                                                                    );
                                                                    $soeCa4 = DB::table('suivi_achat_produits')
                                                                        ->where(
                                                                            'matricule_compte',
                                                                            'like',
                                                                            "%$matricule4[0]%",
                                                                        )
                                                                        ->sum('montant');
                                                                @endphp
                                                                <li>
                                                                    <a href="#"
                                                                        title="{{ $arbre4->generation . ' Géneration' }}"
                                                                        class="{{ 'grade-' . $name4->grade_id }}">
                                                                        {{ $name4->compte_name }}
                                                                        <hr>
                                                                        {{ $name4->code }}
                                                                        <hr>
                                                                        {{ 'VAP ' . $soeTotal4 }}

                                                                        {{ 'VAC : ' . $soeCa4 }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    @endif
                                                @endif
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            @endif
                        </li>
                    @endif
                </ul>

            @endif
        @endif
    @endif
</li>
