<?php

use App\Phrase;
use App\Categorie;
use Illuminate\Database\Seeder;

class PhrasesTableSeeder extends Seeder
{

    public function run()
    {
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Quare hoc quidem praeceptum, cuiuscumque est.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Sed maximum est in amicitia parem esse inferiori.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Quibus occurrere bene pertinax miles explicatis.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Proinde concepta rabie saeviore, quam desperatio.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Hinc ille commotus ut iniusta perferens et indigna.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Advenit post multos Scudilo Scutariorum tribunus.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Inter has ruinarum varietates a Nisibi quam.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Tu autem, Fanni, quod mihi tantum tribui dicis.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Harum trium sententiarum nulli prorsus assentior.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Trium sententiarum nulli prorsus assentior.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Nunc vero inanes flatus quorundam vile esse.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Post hoc impie perpetratum quod in aliis quoque.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Novo denique perniciosoque exemplo idem Gallus.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Post hanc adclinis Libano monti Phoenice, regio.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Utque aegrum corpus quassari etiam levibus solet.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Eodem tempore Serenianus ex duce, cuius ignavia.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Eodem tempore etiam Hymetii praeclarae indolis.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Cognitis enim pilatorum caesorumque funeribus nemo.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Quae dum ita struuntur, indicatum est apud Tyrum.']);
        Phrase::create(['categorie_id' => Categorie::all()->random()->id, 'texte' => 'Altera sententia est, quae definit amicitiam.']);
    }
}
