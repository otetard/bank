<?php

if (!defined('_ECRIRE_INC_VERSION')) return;

/* Par défaut, on interdit la personne qui a payé d'encaisser son
 * propre chèque, même si la personne en question dispose des droits
 * pour encaisser. */
function autoriser_transaction_encaissercheque_dist($faire, $type, $id_transaction, $qui, $opt) { 
  include_spip('base/abstract_sql');

  $id_auteur = sql_getfetsel("id_auteur","spip_transactions","id_transaction=".intval($id_transaction));

  if($id_auteur == $qui['id_auteur']) {
    return false;
  }

  return true;
}
