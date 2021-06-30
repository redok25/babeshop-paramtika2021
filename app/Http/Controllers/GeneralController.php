<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Home;
use App\User;
use App\Barbers;
use App\BarberPage;
use App\Pricing;
use App\PricingPage;
use App\AboutPage;
use App\Galery;
use App\GaleryPage;
use App\Feedback;
use App\FeedbackPage;
use App\BookingPage;
use App\ContactPage;
use App\time;
use App\pesanan;
use App\Sosmed;
use App\VerifyNumber;
use Auth;
use File;

class GeneralController extends Controller
{
    public function welcome() {
    	$home = Home::find(1);
        $sosmed = Sosmed::all();
    	return view('welcome',compact('home','sosmed'));
    }

    public function barbers(){
    	$barberpage = BarberPage::find(1);
    	$barbers = Barbers::all();
        $sosmed = Sosmed::all();
    	return view('barbers',compact('barbers','barberpage','sosmed'));
    }

    public function pricing(){
    	$pricingpage = PricingPage::find(1);
    	$pricing = Pricing::all();
        $sosmed = Sosmed::all();
    	return view('pricing',compact('pricing','pricingpage','sosmed'));
    }

    public function about(){
    	$barberpage = BarberPage::find(1);
    	$barbers = Barbers::all();
    	$pricingpage = PricingPage::find(1);
    	$pricing = Pricing::all();
    	$aboutpage = AboutPage::find(1);
        $feedback = Feedback::all();
        $feedbackpage = FeedbackPage::find(1);
        $sosmed = Sosmed::all();

    	return view('about',compact('aboutpage','barbers','barberpage','pricing','pricingpage','feedback','feedbackpage','sosmed'));
    }

    public function galery(){
        $galerypage = GaleryPage::find(1);
        $galery = Galery::all();
        $sosmed = Sosmed::all();
        return view('galery',compact('galery','galerypage','sosmed'));
    }
    public function feedback(){
        $barberpage = BarberPage::find(1);
        $barbers = Barbers::all();
        $feedback = Feedback::all();
        $feedbackpage = FeedbackPage::find(1);
        $sosmed = Sosmed::all();
        return view('feedback',compact('barbers','barberpage','feedbackpage','feedback','sosmed'));
    }
    public function feedbackProses(Request $req){
        Feedback::create([
            'tukang_cukur_id' => $req->tukang_cukur_id,
            'feedback' => $req->feedback,
            'rating' => $req->rating,
            'date' => date("Y-m-d"),
            'contact' => $req->contact,

        ]);
        $barber = Barbers::find($req->tukang_cukur_id);
        Barbers::find($req->tukang_cukur_id)->update([
            'total_feedback' => $barber->total_feedback+1,
            'total_rating' => $barber->total_rating+$req->rating,
            'rating' => ($barber->total_rating+$req->rating)/($barber->total_feedback+1),
        ]);
        return redirect('feedback')->with('success','Feedback anda telah kami terima.');
    }
    public function booking(){
        $barberpage = BarberPage::find(1);
        $barbers = Barbers::all();
        $pricingpage = PricingPage::find(1);
        $pricing = Pricing::all();
        $bookingpage = BookingPage::find(1);
        $feedback = Feedback::all();
        $feedbackpage = FeedbackPage::find(1);
        $sosmed = Sosmed::all();

        return view('booking',compact('bookingpage','barbers','barberpage','pricing','pricingpage','feedback','feedbackpage','sosmed'));
    }
    public function booking1($id){
        $barberpage = BarberPage::find(1);
        $barbers = Barbers::find($id);
        $pricingpage = PricingPage::find(1);
        $pricing = Pricing::all();
        $bookingpage = BookingPage::find(1);
        $services = Pricing::all();
        $time = time::all();
        $sosmed = Sosmed::all();
        $pagesContact = ContactPage::first();

        $nama_barber = $barbers->nama;
        session()->put('nama_barber', $nama_barber);

        return view('booking1',compact('bookingpage','barberpage','pricing','time','services','sosmed', 'pagesContact'));
    }
    public function bookingdummy(){
        $barberpage = BarberPage::find(1);
        $pricingpage = PricingPage::find(1);
        $pricing = Pricing::all();
        $bookingpage = BookingPage::find(1);
        $services = Pricing::all();
        $time = time::all();
        $sosmed = Sosmed::all();
        return view('bookingdummy',compact('bookingpage','barberpage','pricing','time','services','sosmed'));
    }
    public function bookingProses(Request $req){
        $harga = array();
        $pesanan = array();
        $kode = VerifyNumber::first();

        for($x=0;$x<count($req->pesanan);$x++){
        $PecahStr = explode(",", $req->pesanan[$x]);
            for ( $i = 0; $i < 1; $i++ ) {
             array_push($pesanan,$PecahStr[0]);
             array_push($harga,$PecahStr[1]);

            }
        }
         $total = array_sum($harga);
         $pesanan_valid = implode(", ", $pesanan);
         $tanggal_memesan = date("Y-m-d H:i:s", strtotime($req->date." ".$req->time));

         $testing_waktu = pesanan::where("tanggal_memesan",$tanggal_memesan)->get();
         if (count($testing_waktu) != null ) {
             return redirect()->back()->with('success','Maaf Jadwal anda sudah di booking orang.');
         }

         $barber = Barbers::where("nama",session()->get('nama_barber'))->first();

         if ($req->code == $kode->code) {
             if ($req->panggil == "on") {
                 pesanan::create([
                'nama_pemesan' => $req->nama,
                'pesanan' => $pesanan_valid,
                'tanggal_memesan' => $tanggal_memesan,
                'tukang_cukur' => $barber->id,
                'total_biaya' => $total,
                'status_pesanan' => 0,
                'panggil' => 1,
                'alamat' => $req->alamat,
                'nope' => $req->nope,
             ]);
             }else{
                pesanan::create([
                'nama_pemesan' => $req->nama,
                'pesanan' => $pesanan_valid,
                'tanggal_memesan' => $tanggal_memesan,
                'tukang_cukur' => $barber->id,
                'total_biaya' => $total,
                'status_pesanan' => 0,
                'panggil' => 0,
                'alamat' => "-",
                'nope' => "-",
             ]);
                
             }
         }else {
             return redirect()->back()->with('success','Maaf kode verifikasi salah, silahka coba lagi!');
         }

        $pesanan = pesanan::where('tanggal_memesan', $tanggal_memesan)->first();
         session()->forget('nama_barber');
         session()->put('id_pesanan', $pesanan->id);
         session()->put('rincian', $req->pesanan);
         session()->put('tanggal', $tanggal_memesan);
         session()->put('total', $total);
         return redirect('booking/invoice');

    }
    public function bookingInvoice() {
        if (!session()->has('id_pesanan')) {
            return redirect("booking");
        }
        $tanggal_memesan = date("Y-m-d H:i:s", strtotime(session()->get('tanggal')));
        $id_pesanan = session()->get('id_pesanan');
        $pesanan = pesanan::where('id', $id_pesanan)->first();
        return view('invoice', compact("pesanan"));
    }
    public function contact(){
        $contact = ContactPage::find(1);
        $sosmed = Sosmed::all();
        return view('contact',compact("contact","sosmed"));
    }

    //AUTH =============================
    public function adminLogin(){
        return view('login');
    }
    public function adminLogout(){
        session()->forget('admin');
        session()->flush();
        return redirect('admin/login')->with("error", 'Logout berhasil!');
    }
    public function adminAuth(Request $req){
        $messages = [
            'required' => ':attribute wajib diisi !',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute harus diisi maksimal :max karakter',
        ];
        $this->validate($req, [
        
            'username' => 'required',
            'pass' => 'required',
        ],$messages);

        if (Auth::attempt(['username' => $req->username, 'password' => $req->pass])) {  
            session()->put('admin',$req->username);
        }else {
            return redirect('admin/login')->with('error','Username/Password salah');
        }

    return redirect('admin');
    }
    public function adminChangePassword(Request $req){
        $messages = [
            'required' => ':attribute wajib diisi !',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute harus diisi maksimal :max karakter',
        ];
        $this->validate($req, [
        
            'oldpass' => 'required',
            'newpass' => 'required|same:conpass' ,
        ],$messages);

        if (Auth::attempt(['username' => session()->get('admin') , 'password' => $req->oldpass])) {

            User::where('username', session()->get('admin'))->update([
                'password' => Hash::make($req->newpass)
            ]);

        }else{
            return redirect('/admin')->with('errorCP','Passowrd lama salah');
        }

        session()->forget('admin');
        session()->flush();
        return redirect('admin/login')->with('error','Sesi anda habis silahkan login kembali');
    }

    //==============================================================================================

    public function admin(){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $barber = Barbers::all();
        $pesanan = pesanan::all();
        $service = Pricing::all();
        $photo = Galery::all();
        $feedback = Feedback::all();
        $time = time::all();
        $earning = pesanan::where('status_pesanan',1)->sum('total_biaya');
        $user = User::all();
        $verify = VerifyNumber::first();
        return view('admin',compact("barber","pesanan","service","photo","feedback","time","user","earning","verify"));
    }

    //PAGES ===================================================================================================
    public function pagesHome() {
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $home = Home::find(1);
        return view('pagesHome',compact('home'));
    }
    public function pagesHomeProses(Request $req){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }

        Home::find(1)->update([
            'judul' => $req->judul,
            'isi' => $req->isi,
        ]);

        return redirect('admin/pages/home')->with('pesan','Page berhasil diedit');
    }
    public function pagesAbout() {
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $about = AboutPage::find(1);
        return view('pagesAbout',compact('about'));
    }
    public function pagesAboutProses(Request $req){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }

        AboutPage::find(1)->update([
            'judul1' => $req->judul1,
            'isi1' => $req->isi1,
            'judul2' => $req->judul2,
            'subjudul2' => $req->subjudul2,
            'isi_pilihan1_2' => $req->isi_pilihan1_2,
            'isi_pilihan2_2' => $req->isi_pilihan2_2,
            'isi_pilihan3_2' => $req->isi_pilihan3_2,
            'isi_pilihan4_2' => $req->isi_pilihan4_2,
  
        ]);

        return redirect('admin/pages/about')->with('pesan','Page berhasil diedit');
    }
     public function pagesBarbers() {
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $barbers = BarberPage::find(1);
        return view('pagesBarbers',compact('barbers'));
    }
    public function pagesBarbersProses(Request $req){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }

        BarberPage::find(1)->update([
            'judul' => $req->judul,
            'isi' => $req->isi,
        ]);

        return redirect('admin/pages/barbers')->with('pesan','Page berhasil diedit');
    }
     public function pagesGalery() {
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $galery = GaleryPage::find(1);
        return view('pagesGalery',compact('galery'));
    }
    public function pagesGaleryProses(Request $req){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }

        GaleryPage::find(1)->update([
            'judul' => $req->judul,
            'isi' => $req->isi,
        ]);

        return redirect('admin/pages/galery')->with('pesan','Page berhasil diedit');
    }
    public function pagesFeedback() {
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $feedback = FeedbackPage::find(1);
        return view('pagesFeedback',compact('feedback'));
    }
    public function pagesFeedbackProses(Request $req){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }

        FeedbackPage::find(1)->update([
            'judul' => $req->judul,
            'isi' => $req->isi,
        ]);

        return redirect('admin/pages/feedback')->with('pesan','Page berhasil diedit');
    }
    public function pagesPricing() {
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $pricing = PricingPage::find(1);
        return view('pagesPricing',compact('pricing'));
    }
    public function pagesPricingProses(Request $req){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }

        PricingPage::find(1)->update([
            'judul' => $req->judul,
            'isi' => $req->isi,
        ]);

        return redirect('admin/pages/pricing')->with('pesan','Page berhasil diedit');
    }
    public function pagesBooking() {
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $booking = BookingPage::find(1);
        return view('pagesBooking',compact('booking'));
    }
    public function pagesBookingProses(Request $req){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }

        BookingPage::find(1)->update([
            'judul1' => $req->judul1,
            'isi1' => $req->isi1,
            'judul2' => $req->judul2,
            'isi2' => $req->isi2,
        ]);

        return redirect('admin/pages/booking')->with('pesan','Page berhasil diedit');
    }
    public function pagesContact() {
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $contact = ContactPage::find(1);
        return view('pagesContact',compact('contact'));
    }
    public function pagesContactProses(Request $req){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }

        ContactPage::find(1)->update([
            'judul1' => $req->judul1,
            'isi1' => $req->isi1,
            'judul2' => $req->judul2,
            'isi2' => $req->isi2,
            'judul3' => $req->judul3,
            'isi3' => $req->isi3,
            'lat' => $req->lat,
            'lng' => $req->lng,
        ]);

        return redirect('admin/pages/contact')->with('pesan','Page berhasil diedit');
    }

    //===================================================================================================

    //BARBER==============================================================================================
    public function adminBarber(){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $barbers = Barbers::all();

        return view('adminBarbers', compact("barbers"));
    }
    public function adminBarberAdd(Request $req){
        $this->validate($req, [
            'nama' => 'required',
        ]);
        if (!$req->file) {
            if ($req->kelamin == 'Laki-Laki') {
                Barbers::create([
                'nama' => ucwords($req->nama),
                'kelamin' => $req->kelamin,
                'img' => 'male.jpg',
                'pesanan' => 0,
                'total_feedback' => 0,
                'total_rating' => 0,
                'rating' => 0,
            ]);
            }elseif ($req->kelamin == 'Perempuan' ) {
                Barbers::create([
                'nama' => ucwords($req->nama),
                'kelamin' => $req->kelamin,
                'img' => 'female.jpg',
                'pesanan' => 0,
                'total_feedback' => 0,
                'total_rating' => 0,
                'rating' => 0,
            ]);
            }
        }else {
            $this->validate($req, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
 
        // menyimpan data file yang diupload ke variabel $file
        $file = $req->file('file');
 
        $nama_file = time()."_".$file->getClientOriginalName();
 
                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'img/team';
        $file->move($tujuan_upload,$nama_file);
        Barbers::create([
                'nama' => ucwords($req->nama),
                'kelamin' => $req->kelamin,
                'img' => $nama_file,
                'pesanan' => 0,
                'total_feedback' => 0,
                'total_rating' => 0,
                'rating' => 0,
            ]);
        }

        return redirect('admin/barbers')->with('success','Barber baru telah di tambahkan');

    }
    public function adminBarberEdit(Request $req){
        $this->validate($req, [
            'nama' => 'required',
        ]);
        if (!$req->file) {
                Barbers::find($req->id)->update([
                'nama' => ucwords($req->nama),
                'kelamin' => $req->kelamin,
            ]);
        }else {
            $this->validate($req, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
 
        // menyimpan data file yang diupload ke variabel $file
        $file = $req->file('file');
 
        $nama_file = time()."_".$file->getClientOriginalName();
 
                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'img/team';
        $file->move($tujuan_upload,$nama_file);
        Barbers::find($req->id)->update([
                'nama' => ucwords($req->nama),
                'kelamin' => $req->kelamin,
                'img' => $nama_file,
            ]);
        }

        return redirect('admin/barbers')->with('success','Data Barber telah di edit');

    }
    public function adminBarberDelete($id){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $barber = Barbers::find($id);
        if ($barber->img != 'male.jpg' AND $barber->img != 'female.jpg') {
            File::delete('img/team/'.$barber->img);
        }
        Barbers::find($id)->delete();
        return redirect('admin/barbers')->with('success','Data Barber telah di hapus');

    }
    // ================================================================================================================ 

    //SERVICES ===========================================================================================================
    public function adminService(){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $services = Pricing::all();

        return view('adminServices', compact("services"));
    }
        public function adminServiceAdd(Request $req){
        $this->validate($req, [
            'nama' => 'required',
            'harga' => 'numeric'
        ]);
                Pricing::create([
                'nama' => ucwords($req->nama),
                'harga' => $req->harga,
            ]);

        return redirect('admin/services')->with('success','Service baru telah di tambahkan');

    }
    public function adminServiceEdit(Request $req){
        $this->validate($req, [
            'nama' => 'required',
            'harga' => 'numeric'
        ]);
                Pricing::find($req->id)->update([
                'nama' => ucwords($req->nama),
                'harga' => $req->harga,
            ]);

        return redirect('admin/services')->with('success','Data Service telah di edit');

    }
    public function adminServiceDelete($id){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        Pricing::find($id)->delete();
        return redirect('admin/services')->with('success','Data Service telah di hapus');

    }
    
    //======================================================================================================================

 //OREDERAN===========================================================================================================
    public function adminOrderan(){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $time = time::all();
        $orderan = pesanan::where("panggil",0)->orderBy("status_pesanan","ASC")->orderBy("tanggal_memesan","ASC")->paginate(10);
        $orderan1 = pesanan::where("panggil",1)->orderBy("status_pesanan","ASC")->orderBy("tanggal_memesan","ASC")->paginate(10);
        $barber = Barbers::all();

        return view('adminOrderan', compact("orderan","time","barber","orderan1"));
    }
    public function adminOrderanEdit(Request $req){
        $tanggal_memesan = date("Y-m-d H:i:s", strtotime($req->date." ".$req->time));

         $testing_waktu = pesanan::where("tanggal_memesan",$tanggal_memesan)->get();
         if ($req->ganti == "on") {
             if (count($testing_waktu) != null ) {
             return redirect()->back()->with('success','Maaf Jadwal anda sudah di booking orang.');
         }
         }

         if ($req->panggil == 1) {
             pesanan::find($req->id)->update([
            'tanggal_memesan' => $tanggal_memesan,
            'alamat' => $req->alamat,
            'nope' => $req->nope,
            ]);
         }else {
            pesanan::find($req->id)->update([
            'tanggal_memesan' => $tanggal_memesan,
            ]);
         }

        return redirect('admin/orderan')->with('success','Data Order telah di edit');

    }
    public function adminOrderanUbah($id,$id_barber){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $nilai = 1;
        pesanan::find($id)->update([
            'status_pesanan' => $nilai
        ]);
        $barber = Barbers::find($id_barber)->first();
        $nilai_b = $barber->pesanan + 1;
        Barbers::find($id_barber)->update([
            "pesanan" => $nilai_b,
        ]);
        return redirect('admin/orderan')->with('success','Data Order statusnya telah diubah');

    }
    public function adminOrderanDelete($id){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        pesanan::find($id)->delete();
        return redirect('admin/orderan')->with('success','Data Order telah di hapus');

    }
    
    //======================================================================================================================



//TIME ===========================================================================================================
    public function adminTime(){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $time = time::orderBy('time','ASC')->get();

        return view('adminTime', compact("time"));
    }
        public function adminTimeAdd(Request $req){
        $this->validate($req, [
            'time' => 'required',
        ]);
                time::create([
                'time' => $req->time,
            ]);

        return redirect('admin/time')->with('success','Waktu baru telah di tambahkan');

    }
    public function adminTimeDelete($id){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        time::find($id)->delete();
        return redirect('admin/time')->with('success','Data Waktu telah di hapus');

    }
    
    //======================================================================================================================

    //GALERY ===========================================================================================================
    public function adminGalery(){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $galerys = Galery::all();

        return view('adminGalery', compact("galerys"));
    }

    public function adminGaleryAdd(Request $request){

        $this->validate($request, [
        'title' => 'nullable|max:100',
        'file' => 'required|file|max:2000'
    ]);
    $uploadedFile = $request->file('file');        
    $path = $uploadedFile->store('img/gallery');
        $file = $request->file('file');
    $file->move('img/gallery', time().'.'.$file->getClientOriginalName());
    $file = Galery::create([
        'img' => time().'.'.$file->getClientOriginalName(),
        'keterangan' => $request->keterangan
    ]);
        return redirect()->back()->with('success','Photo telah di tambah');
 
    }

    public function adminGaleryDelete($id){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $galery = Galery::find($id);
        File::delete('img/gallery/'.$galery->img);
        Galery::find($id)->delete();
        return redirect()->back()->with('success','Data Service telah di hapus');

    }
    
    //======================================================================================================================

    //Feedback ==============================================================================================================
     public function adminFeedback(){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $feedbacks = Feedback::orderBy('date','ASC')->paginate(10);

        return view('adminFeedback', compact("feedbacks"));
    }
    // ===========================================================================================================================4

    //SERVICES ===========================================================================================================
    public function adminSosmed(){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        $sosmed = sosmed::all();

        return view('adminSosmed', compact("sosmed"));
    }
        public function adminSosmedAdd(Request $req){
                Sosmed::create([
                'link' => $req->link,
                'jenis_sosmed' => $req->jenis_sosmed,
            ]);

        return redirect('admin/sosmed')->with('success','Sosial Media baru telah di tambahkan');

    }
    public function adminSosmedEdit(Request $req){
                Sosmed::find($req->id)->update([
                'link' => $req->link,
                'jenis_sosmed' => $req->jenis_sosmed,
            ]);

        return redirect('admin/sosmed')->with('success','Data Sosial Media telah di edit');

    }
    public function adminSosmedDelete($id){
        if (!session()->has('admin')) {
            return redirect('admin/login');
        }
        Sosmed::find($id)->delete();
        return redirect('admin/sosmed')->with('success','Data Sosial Media telah di hapus');

    }
    
    //======================================================================================================================

    //VERIFY CODE
    public function adminVerifyCode(Request $req){

        $this->validate($req, [
            'code' => 'required'
        ]);

        VerifyNumber::find(1)->update([
            'code' => $req->code
        ]);

        return redirect('admin')->with('success','Kode verifikasi sudah diganti!');


    }






}


