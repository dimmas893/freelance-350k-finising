<?php

namespace App\Http\Controllers;

use App\Models\Customor;
use App\Models\Outbound;
use App\Models\Wharehouse;
use Illuminate\Http\Request;

class OutboundController extends Controller
{

    // set index page view
    public function index()
    {
        $customor = Customor::all();
        return view('outbound.index', compact('customor'));
    }


    public function customor_cari(Request $request)
    {
        $customor = Outbound::with('p')->where('customor', '!=' , null)->whereBetween('tanggal', [$request->awal, $request->akhir])->get();
        $total = Outbound::with('p')->where('customor', '!=' , null)->whereBetween('tanggal', [$request->awal, $request->akhir])->sum('volume');
        // $totall =json_encode($total);

        return view('outbound.customor', compact('customor','total'));
    }

    public function wharehouse_cari(Request $request)
    {
        $customor = Outbound::with('wharehouse')->where('customor', '!=' , null)->whereBetween('tanggal', [$request->awal, $request->akhir])->get();
        return view('outbound.wharehouse', compact('customor'));
    }

    // handle fetch all eamployees ajax request
    public function all()
    {

        // <td><img src="/storage/images/' . $emp->image . '" width="50" class="img-thumbnail rounded-circle"></td>
        $emps = Outbound::with('wharehouse')->where('tujuan', '!=', null)->get();
        $output = '';
        $p = 1 ;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama WhareHouse</th>
                <th>Tanggal Masuk</th>
                <th>Jenis Barang</th>
                <th>Volume Barang</th>
                <th>Keterangan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->wharehouse->nama . '</td>
                <td>' . $emp->tanggal . '</td>
                <td>' . $emp->jenis_barang . '</td>
                <td>' . $emp->volume . '</td>
                <td>' . $emp->keterangan . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editTUModal"><i class="ion-edit h4" data-pack="default" data-tags="on, off"></i></a>
                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="ion-trash-a h4" data-pack="default" data-tags="on, off"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }


    // public function wharehousecaricari()
    // {
    //     // <td><img src="/storage/images/' . $emp->image . '" width="50" class="img-thumbnail rounded-circle"></td>
    //     $emps = Outbound::with('p')->where('customor', '!=', null)->get();
    //     $output = '';
    //     $p = 1 ;
    //     if ($emps->count() > 0) {
    //         $output .= '<table class="table table-bordered table-md">
    //         <thead>
    //           <tr>
    //             <th>No</th>
    //             <th>Nama Customor</th>
    //             <th>Tanggal Masuk</th>
    //             <th>Jenis Barang</th>
    //             <th>Volume Barang</th>
    //             <th>Keterangan</th>
    //             <th>Action</th>
    //           </tr>
    //         </thead>
    //         <tbody>';
    //         foreach ($emps as $emp) {
    //             $output .= '<tr>
    //             <td>' . $p++ . '</td>
    //             <td>' . $emp->p->nama . '</td>
    //             <td>' . $emp->tanggal . '</td>
    //             <td>' . $emp->jenis_barang . '</td>
    //             <td>' . $emp->volume . '</td>
    //             <td>' . $emp->keterangan . '</td>
    //             <td>
    //               <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editTUModal"><i class="ion-edit h4" data-pack="default" data-tags="on, off"></i></a>
    //               <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="ion-trash-a h4" data-pack="default" data-tags="on, off"></i></a>
    //             </td>
    //           </tr>';
    //         }
    //         $output .= '</tbody></table>';
    //         echo $output;
    //     } else {
    //         echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
    //     }
    // }
    public function total()
    {

        $total = Outbound::where('customor', '!=', null)->sum('volume');
        return response()->json($total);
    }
    public function customor()
    {

        // <td><img src="/storage/images/' . $emp->image . '" width="50" class="img-thumbnail rounded-circle"></td>
        $emps = Outbound::with('p')->where('customor', '!=', null)->get();
        $output = '';
        $p = 1 ;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Customor</th>
                <th>Tanggal Masuk</th>
                <th>Jenis Barang</th>
                <th>Volume Barang</th>
                <th>Keterangan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->p->nama . '</td>
                <td>' . $emp->tanggal . '</td>
                <td>' . $emp->jenis_barang . '</td>
                <td>' . $emp->volume . '</td>
                <td>' . $emp->keterangan . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editTUModal"><i class="ion-edit h4" data-pack="default" data-tags="on, off"></i></a>
                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="ion-trash-a h4" data-pack="default" data-tags="on, off"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }

    // handle insert a new Tu ajax request
    public function store(Request $request)
    {
        // $file = $request->file('image');
        // $fileName = time() . '.' . $file->getClientOriginalExtension();
        // $file->storeAs('public/images', $fileName);

        $empData = [
            'tujuan' => $request->tujuan,
            'customor' => $request->customor,
            'tanggal' => $request->tanggal,
            'jenis_barang' => $request->jenis_barang,
            'volume' => $request->volume,
            'keterangan' => $request->keterangan
        ];
        Outbound::create($empData);
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle edit an Tu ajax request
    public function edit(Request $request)
    {
        $id = $request->id;
        $emp = Outbound::with('wharehouse', 'p')->Find($id);
        return response()->json($emp);
    }

    public function editcustomor(Request $request)
    {
        $id = $request->aku;
        $emp = Outbound::with('wharehouse', 'p')->Find($id);
        return response()->json($emp);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {
        // $fileName = '';
        $emp = Outbound::with('wharehouse', 'p')->Find($request->id);
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $fileName = time() . '.' . $file->getClientOriginalExtension();
        //     $file->storeAs('public/images', $fileName);
        //     if ($emp->image) {
        //         Storage::delete('public/images/' . $emp->image);
        //     }
        // } else {
        //     $fileName = $request->emp_image;
        // }

        $empData = [
            'tanggal' => $request->tanggal,
            'jenis_barang' => $request->jenis_barang,
            'volume' => $request->volume,
            'keterangan' => $request->keterangan
        ];

        $emp->update($empData);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function updatecustomor(Request $request)
    {
        // $fileName = '';
        $emp = Outbound::with('wharehouse', 'p')->Find($request->aku);
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $fileName = time() . '.' . $file->getClientOriginalExtension();
        //     $file->storeAs('public/images', $fileName);
        //     if ($emp->image) {
        //         Storage::delete('public/images/' . $emp->image);
        //     }
        // } else {
        //     $fileName = $request->emp_image;
        // }

        $empData = [
            'customor' => $request->customor,
            'tanggal' => $request->tanggal,
            'jenis_barang' => $request->jenis_barang,
            'volume' => $request->volume,
            'keterangan' => $request->keterangan
        ];

        $emp->update($empData);
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle delete an Tu ajax request
    public function delete(Request $request)
    {
        $id = $request->id;
        $emp = Outbound::find($id);
        Outbound::destroy($id);
    }
}
