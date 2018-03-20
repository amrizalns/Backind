<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction_payment extends Model
{
    protected $primaryKey = 'id_transaksi';
    protected $table = 'transaction_payments';
    protected $fillable = [
      'id_booking',
      'tgl_transfer',
      'bukti_transfer',
      'status_transfer'
    ];
}
