<h1 class="mb-4">Input Program Studi</h1>
    <form action="program_studi\proses1.php" method="POST"> <!--tidak ditulis default action halaman nya sendiri, kalau method defaultnya get => di gabungkan ke url--> 
        <div class="mb-3">
        <label for="nama_prodi" class="form-label">Program Studi</label>
        <select name="nama_prodi" class="form-control" required>
            <option value="">--- Pilih Program Studi ---</option>
            <option value="Teknologi Rekayasa Perangkat Lunak">Teknologi Rekayasa Perangkat Lunak</option>
            <option value="Teknik Komputer">Teknik Komputer</option>
            <option value="Manajemen Informatika">Manajemen Informatika</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Animasi">Animasi</option>
        </select>
        </div>

        <div class="mb-3">
        <label for="jenjang" class="form-label">Jenjang</label>
        <select name="jenjang" class="form-control" required>
            <option value="">--- Pilih Jenjang Prodi ---</option>
            <option value="D2">D2</option>
            <option value="D3">D3</option>
            <option value="D4">D4</option>
            <option value="S2">S2</option>
        </select>
        </div>

        <div class="mb-3">
        <label for="akreditasi" class="form-label">Akreditasi</label>
        <select name="akreditasi" class="form-control" required>
            <option value="">--- Pilih Akreditasi Prodi ---</option>
            <option value="Cukup Baik">Cukup Baik</option>
            <option value="Baik">Baik</option>
            <option value="Baik Sekali">Baik Sekali</option>
            <option value="Sangat Baik">Sangat Baik</option>
        </select>
        </div>


        <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea class="form-control" name = "keterangan" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="mt-4 mb-3">
            <input type="submit" name ="submit" class="btn btn-primary" value="Submit" > 
             <a href="index.php?p=programstudi" class= "btn btn-secondary">List Program Studi</a>

        </div>

         
        


    </form>