<?php

namespace App\Controllers;

use App\Models\ProduitModel;

class ComptaSousEcriture extends BaseController
{
    public function compta_sous_ecriture()
    {
        $produit = new ProduitModel();
        $compta_sous_ecrituer = $produit->getComptaSousEcriture();
        $data['compta_sous_ecriture'] = $compta_sous_ecrituer;
        return view('compta/compta_sous_ecriture',$data);
    }
}
