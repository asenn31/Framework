<?php 

class Kost extends Controller
{
    //ada anjing di rumah
    public function __construct()
    {
        if (!isLoggedIn()){
            redirect('users/login');
        }
        
        $this->kosModel = $this->model('Kos');
    }
    
    public function penyewa()
    {
        if(isset($_GET['nama_penyewa'])){
            $nama_penyewa = $_GET['nama_penyewa'];
            $kos = $this->kosModel->cariNama($nama_penyewa);
            $data = [
                'penyewa' => $kos
            ];
            if (isLoggedIn() == 'Admin') {
                $this->view('kost/penyewa', $data);
            }else if(isLoggedIn() == 'User'){
                $this->view('cs/penyewa', $data);
            }else{
                $this->view('pages/index');
            }
        }
        else{
            $kos = $this->kosModel->showPenyewa();
            $data = [
                'penyewa' => $kos
            ];
            if (isLoggedIn() == 'Admin') {
                $this->view('kost/penyewa', $data);
            }else if(isLoggedIn() == 'User'){
                $this->view('cs/penyewa', $data);
            }else{
                $this->view('pages/index');
            }
        }
    }

    public function kamar()
    {
        if(isset($_GET['kode_kamar'])){
            $kode_kamar = $_GET['kode_kamar'];
            $kos = $this->kosModel->cariKodeKamar($kode_kamar);
            $data = [
                'kamar' => $kos
            ];
            if (isLoggedIn() == 'Admin') {
                $this->view('kost/kamar', $data);
            }else if(isLoggedIn() == 'User'){
                $this->view('cs/kamar', $data);
            }else{
                $this->view('pages/index');
            }
        }
        else{
            $kamar = $this->kosModel->showKamar();
            $data = [
                'kamar' => $kamar
            ];
            if (isLoggedIn() == 'Admin') {
                $this->view('kost/kamar', $data);
            }else if(isLoggedIn() == 'User'){
                $this->view('cs/kamar', $data);
            }else{
                $this->view('pages/index');
            }
        }
       
    }

    public function transaksi()
    {
        if(isset($_GET['kode_penyewa'])){
            $kode_penyewa = $_GET['kode_penyewa'];
            $kos = $this->kosModel->cariKodePenyewa($kode_penyewa);
            $data = [
                'transaksi' => $kos
            ];
            if (isLoggedIn() == 'Admin') {
                $this->view('kost/transaksi', $data);
            }else if(isLoggedIn() == 'User'){
                $this->view('cs/transaksi', $data);
            }else{
                $this->view('pages/index');
            }
        }else{
            $transaksi = $this->kosModel->showTransaksi();
            $data = [
                'transaksi' => $transaksi
            ];
            if (isLoggedIn() == 'Admin') {
                $this->view('kost/transaksi', $data);
            }else if(isLoggedIn() == 'User'){
                $this->view('cs/transaksi', $data);
            }else{
                $this->view('pages/index');
            }
        }
    }

    public function transaksiLain()
    {
        if(isset($_GET['kode_penyewa'])){
            $kode_penyewa = $_GET['kode_penyewa'];
            $kos = $this->kosModel->cariKodePenyewaTL($kode_penyewa);
            $data = [
                'transaksi_lain' => $kos
            ];
            if (isLoggedIn() == 'Admin') {
                $this->view('kost/transaksiLain', $data);
            }else if(isLoggedIn() == 'User'){
                $this->view('cs/transaksiLain', $data);
            }else{
                $this->view('pages/index');
            }
        }else{
            $transaksi_lain = $this->kosModel->showTransaksiLain();
            $data = [
                'transaksi_lain' => $transaksi_lain
            ];
            if (isLoggedIn() == 'Admin') {
                $this->view('kost/transaksiLain', $data);
            }else if(isLoggedIn() == 'User'){
                $this->view('cs/transaksiLain', $data);
            }else{
                $this->view('pages/index');
            }
        }
    }

    public function index()
    {
        $kos = $this->kosModel->showPenyewa();
        $data = [
            'penyewa' => $kos
        ];
        if (isLoggedIn() == 'Admin') {
            $this->view('kost/indexAdmin', $data);
        }else if(isLoggedIn() == 'User'){
            $this->view('cs/indexUser', $data);
        }else{
            $this->view('pages/index');
        }
    }
    
    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'kode_penyewa' => trim($_POST['kode_penyewa']),
                'nama_penyewa' => trim($_POST['nama_penyewa']),
                'jenis_kelamin' => trim($_POST['jenis_kelamin']),
                'status' => trim($_POST['status']),
                'pekerjaan' => trim($_POST['pekerjaan']),
                'umur' => trim($_POST['umur']),
                'kode_penyewa_err' => '',
                'nama_penyewa_err' =>'',
                'jenis_kelamin_err' => '',
                'status_err' => '',
                'pekerjaan_err' =>'',
                'umur_err' => ''
            ];

            // Validasi kode penyewa
            if (empty($data['kode_penyewa'])) {
                $data['kode_penyewa_err'] = 'Mohon Isi Kode Penyewa';
            }

            // Validasi Nama penyewa
            if (empty($data['nama_penyewa'])) {
                $data['nama_penyewa_err'] = 'Mohon Isi Nama';
            }

            // Validasi Jenis Kelamin
            if (empty($data['jenis_kelamin'])) {
                $data['jenis_kelamin_err'] = 'Mohon Isi Jurusan';
            } 
            // Validasi status
            if (empty($data['status'])) {
                $data['status_err'] = 'Mohon Isi Status';
            }

            // Validasi pekerjaan
            if (empty($data['pekerjaan'])) {
                $data['pekerjaan_err'] = 'Mohon Isi Pekerjaan';
            }

            // Validasi umur
            if (empty($data['umur'])) {
                $data['umur_err'] = 'Mohon Isi Umur';
            } 

            if (empty($data['kode_penyewa_err']) && empty($data['nama_penyewa_err']) && empty($data['jenis_kelamin_err']) && empty($data['status_err']) && empty($data['pekerjaan_err']) && empty($data['umur_err'])) {
                $datatambah = $this->kosModel->tambah($data);
                
                if ($datatambah) {
                    if (isLoggedIn() == 'Admin') {
                        redirect('kost/penyewa');
                    }else if(isLoggedIn() == 'User'){
                        redirect('cs/penyewa');
                    }else{
                        $this->view('pages/index');
                    }
                   
                }
            } else {
                // Load view dengan error
                if (isLoggedIn() == 'Admin') {
                    $this->view('kost/tambah', $data);
                }else{
                    $this->view('cs/tambah', $data);
                }                
            }

            
        } else {
            $data = [
                'kode_penyewa' => '',
                'nama_penyewa' =>'',
                'jenis_kelamin' => '',
                'status' => '',
                'pekerjaan' =>'',
                'umur' => '',
                'kode_penyewa_err' => '',
                'nama_penyewa_err' =>'',
                'jenis_kelamin_err' => '',
                'status_err' => '',
                'pekerjaan_err' =>'',
                'umur_err' => ''
            ];
            if (isLoggedIn() == 'Admin') {
                $this->view('kost/tambah', $data);
            }else{
                $this->view('cs/tambah', $data);
            }       
        }
    }

    public function tambahKamar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'kode_kamar' => trim($_POST['kode_kamar']),
                'luas_kamar' => trim($_POST['luas_kamar']),
                'harga_kamar' => trim($_POST['harga_kamar']),
                'keterangan' => trim($_POST['keterangan']),
                'kode_kamar_err' => '',
                'luas_kamar_err' =>'',
                'harga_kamar_err' => '',
                'keterangan_err' => ''
            ];

            // Validasi kode kamar
            if (empty($data['kode_kamar'])) {
                $data['kode_kamar_err'] = 'Mohon Isi Kode Kamar';
            }

            // Validasi Nama luas kamar
            if (empty($data['luas_kamar'])) {
                $data['luas_kamar_err'] = 'Mohon Isi Luas Kamar';
            }

            // Validasi Jenis harga
            if (empty($data['harga_kamar'])) {
                $data['harga_kamar_err'] = 'Mohon Isi Harga Kamar';
            } 
            // Validasi keterangan
            if (empty($data['keterangan'])) {
                $data['keterangan_err'] = 'Mohon Isi Keterangan';
            }

            if (empty($data['kode_kamar_err']) && empty($data['luas_kamar_err']) && empty($data['harga_kamar_err']) && empty($data['keterangan_err'])) {
                $datatambah = $this->kosModel->tambahKamar($data);
                
                if ($datatambah) {
                    if (isLoggedIn() == 'Admin') {
                        redirect('kost/penyewa');
                    }else if(isLoggedIn() == 'User'){
                        redirect('cs/penyewa');
                    }else{
                        $this->view('pages/index');
                    }
                }
            } else {
                // Load view dengan error
                if (isLoggedIn() == 'Admin') {
                    $this->view('kost/tambahKamar', $data);
                }else{
                    $this->view('cs/tambahKamar', $data);
                }                
            }

            
        } else {
            $data = [
                'kode_kamar' => '',
                'luas_kamar' =>'',
                'harga_kamar' => '',
                'keterangan' => '',
                'kode_kamar_err' => '',
                'luas_kamar_err' =>'',
                'harga_kamar_err' => '',
                'keterangan_err' => ''
            ];
    
            if (isLoggedIn() == 'Admin') {
                $this->view('kost/tambahKamar', $data);
            }else{
                $this->view('cs/tambahKamar', $data);
            }                
        }
    }

    public function tambahTransaksi()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'kode_penyewa' => trim($_POST['kode_penyewa']),
                'kode_fasilitaskamar' => trim($_POST['kode_fasilitaskamar']),
                'tanggal_masuk' => trim($_POST['tanggal_masuk']),
                'tanggal_keluar' => trim($_POST['tanggal_keluar']),
                'kode_penyewa_err' => '',
                'kode_fasilitaskamar_err' =>'',
                'tanggal_masuk_err' => '',
                'tanggal_keluar_err' => ''
            ];

            // Validasi kode penyewa
            if (empty($data['kode_penyewa'])) {
                $data['kode_penyewa_err'] = 'Mohon Isi Kode Penyewa';
            }

            // Validasi kode fasilitas kamar
            if (empty($data['kode_fasilitaskamar'])) {
                $data['kode_fasilitaskamar_err'] = 'Mohon Isi Kode Fasilitas Kamar';
            }

            // Validasi Tanggal Masuk
            if (empty($data['tanggal_masuk'])) {
                $data['tanggal_masuk_err'] = 'Mohon Isi Tanggal Masuk';
            } 
            // Validasi Tanggal Keluar
            if (empty($data['tanggal_keluar'])) {
                $data['tanggal_keluar_err'] = 'Mohon Isi Tanggal Keluar';
            }

            if (empty($data['kode_penyewa_err']) && empty($data['kode_fasilitaskamar_err']) && empty($data['tanggal_masuk_err']) && empty($data['tanggal_keluar_err'])) {
                $datatambah = $this->kosModel->tambahTransaksi($data);
                
                if ($datatambah) {
                    if (isLoggedIn() == 'Admin') {
                        redirect('kost/transaksi');
                    }else if(isLoggedIn() == 'User'){
                        redirect('cs/transaksi');
                    }else{
                        $this->view('pages/index');
                    }
                }
            } else {
                // Load view dengan error
                if (isLoggedIn() == 'Admin') {
                    $this->view('kost/tambahTransaksi', $data);
                }else{
                    $this->view('cs/tambahTransaksi', $data);
                }  
            }

            
        } else {
            $data = [
                'kode_penyewa' => '',
                'kode_fasilitaskamar' =>'',
                'tanggal_masuk' => '',
                'tanggal_keluar' => '',
                'kode_penyewa_err' => '',
                'kode_fasilitaskamar_err' =>'',
                'tanggal_masuk_err' => '',
                'tanggal_keluar_err' => ''
            ];
    
            if (isLoggedIn() == 'Admin') {
                $this->view('kost/tambahTransaksi', $data);
            }else{
                $this->view('cs/tambahTransaksi', $data);
            }  
        }
    }

    public function tambahTransaksiLain()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'kode_penyewa' => trim($_POST['kode_penyewa']),
                'tanggal' => trim($_POST['tanggal']),
                'keterangan' => trim($_POST['keterangan']),
                'kode_penyewa_err' => '',
                'tanggal_err' =>'',
                'keterangan_err' => ''
            ];

            // Validasi kode penyewa
            if (empty($data['kode_penyewa'])) {
                $data['kode_penyewa_err'] = 'Mohon Isi Kode Penyewa';

            // Validasi tanggal
            if (empty($data['tanggal'])) {
                $data['tanggal_err'] = 'Mohon Isi Tanggal';
            }

            // Validasi keterangan
            if (empty($data['keterangan'])) {
                $data['keterangan_err'] = 'Mohon Isi Keterangan';
            } 

            if (empty($data['kode_penyewa_err']) && empty($data['tanggal_err']) && empty($data['keterangan_err'])) {
                $datatambah = $this->kosModel->tambahTransaksiLain($data);
                
                if ($datatambah) {
                    if (isLoggedIn() == 'Admin') {
                        redirect('kost/transaksiLain');
                    }else if(isLoggedIn() == 'User'){
                        redirect('cs/transaksiLain');
                    }else{
                        $this->view('pages/index');
                    }
                }
            } else {
                // Load view dengan error
                if (isLoggedIn() == 'Admin') {
                    $this->view('kost/tambahTransaksiLain', $data);
                }else{
                    $this->view('cs/tambahTransaksiLain', $data);
                }  
            }

            
        } else {
            $data = [
                'kode_penyewa' => '',
                'tanggal' =>'',
                'keterangan' => '',
                'kode_penyewa_err' => '',
                'tanggal_err' =>'',
                'keterangan_err' => ''
            ];
    
            if (isLoggedIn() == 'Admin') {
                $this->view('kost/tambahTransaksiLain', $data);
            }else{
                $this->view('cs/tambahTransaksiLain', $data);
            }  
        }
    }

}
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'id' => $id,
                'kode_penyewa' => trim($_POST['kode_penyewa']),
                'nama_penyewa' => trim($_POST['nama_penyewa']),
                'jenis_kelamin' => trim($_POST['jenis_kelamin']),
                'status' => trim($_POST['status']),
                'pekerjaan' => trim($_POST['pekerjaan']),
                'umur' => trim($_POST['umur'])
            ];

            if (!empty($data['kode_penyewa']) && !empty($data['nama_penyewa']) && !empty($data['jenis_kelamin']) && !empty($data['status']) && !empty($data['pekerjaan']) && !empty($data['umur'])) {
                $dataedit = $this->kosModel->edit($data);
                if ($dataedit) {
                    if (isLoggedIn() == 'Admin') {
                        redirect('kost/penyewa');
                    }else if(isLoggedIn() == 'User'){
                        redirect('kost/penyewa');
                    }else{
                        $this->view('pages/index');
                    }
                }
            }
        } else {
            $kos = $this->kosModel->pilihdariId($id);
            $data = [
                'penyewa' => $kos
            ];
            if (isLoggedIn() == 'Admin') {
                $this->view('kost/update', $data);
            }else{
                $this->view('cs/update', $data);
            }  
        }
    }
    public function updateKamar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);            
            
            $data = [
                'id' => $id,
                'kode_kamar' => trim($_POST['kode_kamar']),
                'luas_kamar' => trim($_POST['luas_kamar']),
                'harga_kamar' => trim($_POST['harga_kamar']),
                'keterangan' => trim($_POST['keterangan'])
            ];

            if (!empty($data['kode_kamar']) && !empty($data['luas_kamar']) && !empty($data['harga_kamar']) && !empty($data['keterangan'])) {
                $dataedit = $this->kosModel->editKamar($data);
                if ($dataedit) {
                    if (isLoggedIn() == 'Admin') {
                        redirect('kost/kamar');
                    }else if(isLoggedIn() == 'User'){
                        redirect('cs/kamar');
                    }else{
                        $this->view('pages/index');
                    }
                }
            }
        } else {
            $kos = $this->kosModel->pilihdariIdKamar($id);
            $data = [
                'kamar' => $kos
            ];
    
            if (isLoggedIn() == 'Admin') {
                $this->view('kost/updateKamar', $data);
            }else{
                $this->view('cs/updateKamar', $data);
            }  
        }
    }

    public function hapus($id)
    {
        if ($this->kosModel->delete($id)) {
            if (isLoggedIn() == 'Admin') {
                redirect('kost/penyewa');
            }else if(isLoggedIn() == 'User'){
                redirect('cs/penyewa');
            }else{
                $this->view('pages/index');
            }
        } else {
            die('ada yang salah');
        }
    }

    public function hapusKamar($id)
    {
        if ($this->kosModel->deleteKamar($id)) {
            if (isLoggedIn() == 'Admin') {
                redirect('kost/kamar');
            }else if(isLoggedIn() == 'User'){
                redirect('cs/kamar');
            }else{
                $this->view('pages/index');
            }
        } else {
            die('ada yang salah');
        }
    }

    public function hapusTransaksi($id)
    {
        if ($this->kosModel->deleteTransaksi($id)) {
            if (isLoggedIn() == 'Admin') {
                redirect('kost/transaksi');
            }else if(isLoggedIn() == 'User'){
                redirect('cs/transaksi');
            }else{
                $this->view('pages/index');
            }
        } else {
            die('ada yang salah');
        }
    }
    
    public function hapusTransaksiLain($id)
    {
        if ($this->kosModel->deleteTransaksiLain($id)) {
            if (isLoggedIn() == 'Admin') {
                redirect('kost/transaksiLain');
            }else if(isLoggedIn() == 'User'){
                redirect('cs/transaksiLain');
            }else{
                $this->view('pages/index');
            }
        } else {
            die('ada yang salah');
        }
    }
}
