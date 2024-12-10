<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\WishlistModel;

class Wishlist extends BaseController {
    protected $wishlistmodel;
    protected $productmodel;

    public function __construct() {
        $this->wishlistmodel = new WishlistModel();
        $this->productmodel = new ProductModel();
    }

    public function addWishlist($product_id) {
        $user_id = session()->get('user_id');

        if (!$user_id) {
            session()->setFlashdata('error', 'login dulu kocaG');
            return redirect()->to('/login'); // Redirect ke halaman login jika user belum login
        }

        $existWishlist = $this->wishlistmodel->where('user_id', $user_id)->where('product_id', $product_id)->first();
        if($existWishlist) {
            session()->setFlashdata('Produk ini sudah ada di wishlist');
        } else {
            $data = ['user_id' => $user_id, 'product_id' => $product_id];
            $this->wishlistmodel->insert($data);
            session()->setFlashdata('success', 'Produk berhasil ditambahkan ke wishlist');
        }
        return redirect()->back();
    }

    public function delWishlist($product_id) {
        //
    }

    public function index() {
        $user_id = session()->get('user_id');
        $wishlist_items = $this->wishlistmodel->where('user_id', $user_id)->findColumn('product_id');
        $dataproduk = [];
        if ($wishlist_items) {
            $dataproduk = $this->productmodel->whereIn('product_id', $wishlist_items)->findAll();
        }
        return view('pages/wishlist', ['dataproduk' => $dataproduk]);
    }
}