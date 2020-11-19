<?php 

class Kos  
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function showPenyewa()
    {
        $this->db->query('SELECT * FROM penyewa');

        $result = $this->db->resultSet();

        return $result;
    }

    public function showKamar()
    {
        $this->db->query('SELECT * FROM kamar');

        $result = $this->db->resultSet();

        return $result;
    }

    public function showTransaksi()
    {
        $this->db->query('SELECT * FROM transaksi');

        $result = $this->db->resultSet();

        return $result;
    }

    public function showTransaksiLain()
    {
        $this->db->query('SELECT * FROM transaksi_lain');

        $result = $this->db->resultSet();

        return $result;
    }

    public function cariNama($nama_penyewa)
    {
        $this->db->query('SELECT * FROM penyewa WHERE nama_penyewa = :nama_penyewa');

        $this->db->bind(':nama_penyewa', $nama_penyewa);

        $result = $this->db->resultSet();
        
        return $result;
    }

    public function cariKodeKamar($kode_kamar)
    {
        $this->db->query('SELECT * FROM kamar WHERE kode_kamar = :kode_kamar');

        $this->db->bind(':kode_kamar', $kode_kamar);

        $result = $this->db->resultSet();
        
        return $result;
    }

    public function cariKodePenyewa($kode_penyewa)
    {
        $this->db->query('SELECT * FROM transaksi WHERE kode_penyewa = :kode_penyewa');

        $this->db->bind(':kode_penyewa', $kode_penyewa);

        $result = $this->db->resultSet();
        
        return $result;
    }

    public function cariKodePenyewaTL($kode_penyewa)
    {
        $this->db->query('SELECT * FROM transaksi_lain WHERE kode_penyewa = :kode_penyewa');

        $this->db->bind(':kode_penyewa', $kode_penyewa);

        $result = $this->db->resultSet();
        
        return $result;
    }

    public function tambah($data)
    {
        $this->db->query('INSERT INTO penyewa(kode_penyewa, nama_penyewa, jenis_kelamin, status, pekerjaan, umur) VALUES (:kode_penyewa, :nama_penyewa, :jenis_kelamin, :status, :pekerjaan, :umur)');
        
        $this->db->bind(':kode_penyewa', $data['kode_penyewa']);
        $this->db->bind(':nama_penyewa', $data['nama_penyewa']);
        $this->db->bind(':jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':pekerjaan', $data['pekerjaan']);
        $this->db->bind(':umur', $data['umur']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function tambahKamar($data)
    {
        $this->db->query('INSERT INTO kamar(kode_kamar, luas_kamar, harga_kamar, keterangan) VALUES (:kode_kamar, :luas_kamar, :harga_kamar, :keterangan)');
        
        $this->db->bind(':kode_kamar', $data['kode_kamar']);
        $this->db->bind(':luas_kamar', $data['luas_kamar']);
        $this->db->bind(':harga_kamar', $data['harga_kamar']);
        $this->db->bind(':keterangan', $data['keterangan']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function tambahTransaksi($data)
    {
        $this->db->query('INSERT INTO transaksi(kode_penyewa, kode_fasilitaskamar, tanggal_masuk, tanggal_keluar) VALUES (:kode_penyewa, :kode_fasilitaskamar, :tanggal_masuk, :tanggal_keluar)');
        
        $this->db->bind(':kode_penyewa', $data['kode_penyewa']);
        $this->db->bind(':kode_fasilitaskamar', $data['kode_fasilitaskamar']);
        $this->db->bind(':tanggal_masuk', $data['tanggal_masuk']);
        $this->db->bind(':tanggal_keluar', $data['tanggal_keluar']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function tambahTransaksiLain($data)
    {
        $this->db->query('INSERT INTO transaksi_lain(kode_penyewa, tanggal, keterangan) VALUES (:kode_penyewa, :tanggal, :keterangan)');
        
        $this->db->bind(':kode_penyewa', $data['kode_penyewa']);
        $this->db->bind(':tanggal', $data['tanggal']);
        $this->db->bind(':keterangan', $data['keterangan']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function pilihdariId($id)
    {
        $this->db->query('SELECT * FROM penyewa WHERE id = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function pilihdariIdKamar($id)
    {
        $this->db->query('SELECT * FROM kamar WHERE id = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }


    public function edit($data)
    {
        $this->db->query('UPDATE penyewa SET kode_penyewa = :kode_penyewa, nama_penyewa = :nama_penyewa, jenis_kelamin = :jenis_kelamin, status = :status, pekerjaan = :pekerjaan, umur = :umur WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':kode_penyewa', $data['kode_penyewa']);
        $this->db->bind(':nama_penyewa', $data['nama_penyewa']);
        $this->db->bind(':jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':pekerjaan', $data['pekerjaan']);
        $this->db->bind(':umur', $data['umur']);

        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM penyewa WHERE id = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function deleteKamar($id)
    {
        $this->db->query('DELETE FROM kamar WHERE id = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteTransaksi($id)
    {
        $this->db->query('DELETE FROM transaksi WHERE id = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteTransaksiLain($id)
    {
        $this->db->query('DELETE FROM transaksi_lain WHERE id = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
