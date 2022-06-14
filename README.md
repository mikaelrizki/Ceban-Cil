# Ceban-Cil

![Build Status](https://img.shields.io/github/workflow/status/mikaelrizki/Ceban-Cil/pages%20build%20and%20deployment?style=for-the-badge)
![Repository Size](https://img.shields.io/github/repo-size/mikaelrizki/Ceban-Cil?color=orange&style=for-the-badge)
![Language Count](https://img.shields.io/github/languages/count/mikaelrizki/Ceban-Cil?color=red&style=for-the-badge)
![HTML](https://img.shields.io/github/languages/top/mikaelrizki/Ceban-Cil?color=red&style=for-the-badge)

Cegah Banjir Ciliwung
Early Warning System for Flooding in Ciliwung River
Tugas Akhir Mata Kuliah Kecerdasan Buatan Grup A

**Dosen Pengampu :** 
- Matahari Bhakti Nendya, S.Kom., M.T.

**Anggota Kelompok 5 :**
- Narendra Poetra Wisnoewardhana    (71200555)
- Mikael Rizki Pandu Ekanto         (71200560)
- Imanuel Vicky Sanjaya             (71200563)
- Michelle Shannen Audrey Dharmawan (71200564)
- Yusak Satria Pradana Arysutanto   (71200625)

### This Project Information
- Project Version : v2
- Upload Date     : 14 June 2022
- Project Link    : [https://mikaelrizki.github.io/Workout-Tube/]

### About Our Project
- Raw Version made with Python 3.10.
- Web Application made with PHP, JS, CSS, HTML, MySQL

### About This Repo
- Raw Version : main.py
- Project Documentation : documentation.ipynb
- Web Application : index.php
- Laporan : Laporan TA AI Kelompok 5.pdf
- Readme.md

### Checkout Project

```bash
# Checkout project
$ git checkout git@github.com:mikaelrizki/Ceban-Cil.git

# Update submodule
$ git submodule init
$ git submodule update --remote
```

### Source
- Image    : Canva Professional
- Editing  : Canva Professional 

### Support Website
- GitHub        : https://www.w3schools.com/css/
- Stackoverflow : https://stackoverflow.com/
- GeeksForGeeks : https://www.geeksforgeeks.org/

### Our Datasheet
- Library json akan digunakan untuk membaca _datasheet_ dalam bentuk JSON.
- _Datasheet_ tersebut kami peroleh dari Kaggle. 
- Berikut adalah sumber referensi _datasheet_ yang kami gunakan :
[https://www.kaggle.com/datasets/asfilianova/dataset-banjir-sungai-ciliwung?resource=download]

### Structure of JSON File
Berikut adalah struktur dari file JSON yang akan digunakan untuk analisis dan pengembangan sistem cerdas pendeteksi banjir yang akan kami buat.
```
[
    {
        "Tanggal": "01\/01\/2020",
        "Waktu": "0:00:00",
        "Katulampa": 0,
        "Pos Depok": 0,
        "Manggarai": 0,
        "Istiqlal": 0,
        "Jembatan Merah": 0
    }
]
```

### Version History
#### v1
- Pembuatan aplikasi berbasi bahasa pemrograman Python.
- Menggunakan method import JSON.
- Import JSON digunakan untuk mengambil data dari datasheet.
- Menggunakan teknik Forward Chaining dengan bentuk representasi pengetahuan List.

#### v2
- Perubahan basis aplikasi menjadi Web Application.
- Menggunakan database sebagai bentuk penyimpanan data pembanding.
