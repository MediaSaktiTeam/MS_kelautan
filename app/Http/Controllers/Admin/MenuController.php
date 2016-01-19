<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Menu, App\Page, App\Kategori;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex(Request $request)
    {
        if ( !$request->jenis ) {
        
            return redirect(route('menu',['jenis' => 'Header']));
        
        } else {

            $Menus = Menu::where('lokasi',$request->jenis)
                            ->where('parent_id',0)
                            ->orderBy('urutan', 'asc')->get();

            $Kategori = Kategori::orderBy('nama_kategori', 'asc')->get();
            $Pages      = Page::where('draft', 0)
                        ->where('arsip', 0)
                        ->orderBy('id', 'desc')->get();

            return view('admin.menu.index',
                [
                    'Menus' => $Menus,
                    'Kategori' => $Kategori,
                    'Pages' => $Pages,
                    'Jenis' => $request->jenis,
                ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function postSimpan(Request $request)
    {   
        $jenis      = $request->tipe;
        $Max_urut   = Menu::where('parent_id', $request->parent_id)
                            ->where('lokasi',$request->lokasi)->max('urutan');
        $urutan     = $Max_urut + 1;

        $id_arr     = [];
        $judul_arr  = [];
        $link_arr   = [];

        if ( $jenis == "Kategori" || $jenis == "Halaman" ) {

            foreach( $request->arr_value as $Val ) {

                if ( $jenis == "Kategori" ) {
                  
                    $Data = Kategori::find($Val);
                    $link = url('/blog/Kategori')."/".$Data->slug;
                    $judul = $Data->nama_kategori;
                    $judul_arr[] = $judul;
                    $link_arr[] = $link;
                
                } else {

                    $Data = Page::find($Val);
                    $link = url('/page')."/".$Data->slug;
                    $judul = $Data->judul;
                    $judul_arr[] = $judul;
                    $link_arr[] = $link;

                }

                $Menu = new Menu;
                $Menu->judul    = $judul;
                $Menu->link     = $link;
                $Menu->parent_id= $request->parent_id;
                $Menu->urutan   = $urutan;
                $Menu->lokasi   = $request->lokasi;
                $Menu->jenis    = $jenis;
                $Menu->save();
                $id_arr[] = $Menu->id;
            }

        } else {

            $Menu = new Menu;
            $Menu->judul    = $request->judul;
            $Menu->link     = $request->link;
            $Menu->parent_id= $request->parent_id;
            $Menu->urutan   = $urutan;
            $Menu->lokasi   = $request->lokasi;
            $Menu->jenis    = $jenis;
            $Menu->save();
            $id_arr[] = $Menu->id;

        }

        ?>

        <?php $no = 0; ?>

        <?php foreach( $id_arr as $id ) { ?>


            <?php $judul_ = $jenis == "Kategori" || $jenis == "Halaman" ? $judul_arr[$no] : $request->judul ?>
            <?php $link_  = $jenis == "Kategori" || $jenis == "Halaman" ? $link_arr[$no] : $request->link ?>
            <?php $selector_id = $request->parent_id == 0 ? "":"2" ?>

            <div class="panel panel-default" id="arrayOrder<?php echo $selector_id ?>-<?php echo $id ?>" style="margin-bottom:5px;color:#000">
                <div class="panel-heading" style="border:none;background:#eee;">
                    <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#primary-menu" href="#menu-<?php echo $id ?>">
                            <span class='judul'><?php echo $judul_ ?> <?php echo $request->parent_id == 0 ? "":"<small> &nbsp; Sub Menu</small>" ?></span>
                            <label class="pull-right">
                                <small><?php echo $jenis ?></small>
                            </label>
                        </a>
                    </h4>

                </div>

                <div id="menu-<?php echo $id ?>" class="panel-collapse collapse">
                    <div class="panel-body" style="background:#fff;height:auto;max-height:200px;overflow-y:scroll;color:#444">
                        
                        <input type="hidden" name="id" value="<?php echo $id ?>">

                        <?php if ( $jenis == "Kategori" || $jenis == "Halaman" ) { ?>
                         
                            <label>Nama Menu</label>
                            <input type="text" class="form-control" name="nama_menu" value="<?php echo $judul_ ?>">
                            <input type="hidden" name="link" value="<?php echo $link_ ?>">

                        <?php } else { ?>

                            <label>Nama Menu</label>
                            <input type="text" class="form-control" name="nama_menu" value="<?php echo $judul_ ?>">
                            <br>
                            <label>Link/Url</label>
                            <input type="text" class="form-control" name="link" value="<?php echo $link_ ?>">
                        
                        <?php } ?>
                        
                        <br>

                        <a href="javascript:;" class="update-menu-item" style="color:green">Simpan</a>
                        <label class="pull-right">
                            <a href="javascript:;" class="hapus-menu-item" style="color:#a00">Hapus</a>
                        </label>
                    </div>

                </div>
            </div>

            <?php $no++; ?>

        <?php } ?>

    <?php

    }

    public function postUpdate(Request $request)
    {
        $judul  = $request->judul;
        $link   = $request->link;

        $Menu = Menu::find($request->id);
        $Menu->judul    = $judul;
        $Menu->link     = $link;
        $Menu->save();
    }

    public function postUpdateUrutan(Request $request)
    {
        $urutan = explode("&",$request->urutan);
        $no = 1;
        foreach( $urutan as $val ){
            $val = explode("=", $val);
            $Menu = Menu::find($val[1]);
            $Menu->urutan = $no;
            $Menu->save();
            $no++;
        }
    }


    public function postHapus(Request $request)
    {
        $Menu = Menu::find($request->id);
        $parent_id = $Menu->parent_id;

        if ( $parent_id == 0 ) {
            Menu::where('parent_id', $request->id)->delete();  
        }

        Menu::where('id', $request->id)->delete();
    }


    public function siteURL()
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'].'/';
        return $protocol.$domainName;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function getParentMenu($lokasi)
    {
        $Menus = Menu::where('parent_id',0)->where('lokasi', $lokasi)->get();
        return view('admin.layout.inc.getParentMenu', ['Menus' => $Menus]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
