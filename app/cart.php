<?php
namespace App;

class Cart
{
    public $items ;
    public $total =0;
    public $totalharga = 0;
    public $volumetotal =0;

    public function __construct($oldcart)
    {
        if ($oldcart!=null) {
            $this->items = $oldcart->items;
            $this->total = $oldcart->total;
            $this->totalharga = $oldcart->totalharga;
            $this->volumetotal = $oldcart->volumetotal;
        }
    }
    public function add($item,$id,$jumlah)
    {
        $storeditems = [
            'jumlahitems' => 0,
            'hargaitems' => $item['harga'],
            'detail' => $item
        ];
        if ($this->items) {
            if (array_key_exists($id,$this->items)) {
                $storeditems = $this->items[$id];
                $this->items[$id] = $storeditems;
                $this->total+=$jumlah;
                $this->totalharga+=$item['harga']*$jumlah;
                $this->volumetotal+=$item['berat']*$jumlah ;
            }
        }
        if ($jumlah!=0) {
            $storeditems['jumlahitems']+=$jumlah;
            $storeditems['hargaitems'] = $item['harga'] * $storeditems['jumlahitems'];
            $this->items[$id] = $storeditems;
            $this->total+=$jumlah;
            $this->totalharga+=$item['harga']*$jumlah;
            $this->volumetotal+=$item['berat']*$jumlah ;
        }
        else{
            $storeditems['jumlahitems']++;
            $storeditems['hargaitems'] = $item['harga'] * $storeditems['jumlahitems'];
            $this->items[$id] = $storeditems;
            $this->total++;
            $this->totalharga+=$item['harga'];
            $this->volumetotal+=$item['berat'] ;
        }
    }
}
