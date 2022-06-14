# Early Warning System for Flooding in Ciliwung River

import json
import time

def Katulampa(tinggi):
    if tinggi > 200:
        statusKatulampa = 'Bahaya'
    elif tinggi > 150:
        statusKatulampa = 'Siaga'
    elif tinggi >= 80:
        statusKatulampa = 'Waspada'
    else:
        statusKatulampa = 'Normal'
    return statusKatulampa

def PosDepok(tinggi):
    if tinggi > 350:
        statusPosDepok = 'Bahaya'
    elif tinggi > 270:
        statusPosDepok = 'Siaga'
    elif tinggi >= 200:
        statusPosDepok = 'Waspada'
    else:
        statusPosDepok = 'Normal'
    return statusPosDepok

def Manggarai(tinggi):
    if tinggi > 950:
        statusManggarai = 'Bahaya'
    elif tinggi > 850:
        statusManggarai = 'Siaga'
    elif tinggi >= 750:
        statusManggarai = 'Waspada'
    else:
        statusManggarai = 'Normal'
    return statusManggarai

def Istiqlal(tinggi):
    if tinggi > 350:
        statusIstiqlal = 'Bahaya'
    elif tinggi > 300:
        statusIstiqlal = 'Siaga'
    elif tinggi >= 250:
        statusIstiqlal = 'Waspada'
    else:
        statusIstiqlal = 'Normal'
    return statusIstiqlal

def JembatanMerah(tinggi):
    if tinggi > 250:
        statusMerah = 'Bahaya'
    elif tinggi > 200:
        statusMerah = 'Siaga'
    elif tinggi >= 150:
        statusMerah = 'Waspada'
    else:
        statusMerah = 'Normal'
    return statusMerah

def prediksiKetinggian(sebelum,sekarang):
    if sekarang > sebelum:
        return sekarang + (sekarang - sebelum)
    elif sebelum > sekarang:
        return sekarang + (sebelum - sekarang)
    else:
        return sebelum

def prediksiBanjir(katulampa, posDepok, manggarai, istiqlal, jembatanMerah):
    kl = katulampa
    pd = posDepok
    mg = manggarai
    it = istiqlal
    jm = jembatanMerah
    
    # Jika status ketinggian Katulampa berada pada posisi "Siaga" atau "Bahaya" 
    # Maka dapat dipastikan DAS Ciliwung akan banjir
    if kl == 'Siaga' or kl == 'Bahaya':
        pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
    elif kl == 'Waspada':
        # Jika status ketinggian Katulampa berada pada posisi "Waspada"
        # Maka akan dilanjutkan pengecekan kondisi 4 lokasi pemantauan lainnya
        
        # Jika keempatnya "Bahaya"
        if pd == 'Bahaya' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        
        # Jika 3 "Bahaya" 1 "Siaga"
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        
        # Jika 3 "Bahaya" 1 "Waspada"
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        
        # Jika 3 "Bahaya" 1 "Normal"
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        
        # Jika 2 "Bahaya" 2 "Siaga"
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        
        # Jika 2 "Bahaya" 1 "Siaga" 1 "Waspada"
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pos Depok dan Manggarai berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pos Depok dan Manggarai berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pos Depok dan Istiqlal berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pos Depok dan Istiqlal berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pos Depok dan Jembatan Merah berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pos Depok dan Jembatan Merah berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Manggarai dan Istiqlal berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Manggarai dan Jembatan Merah berpotensi terjadi banjir!'
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Manggarai dan Istiqlal berpotensi terjadi banjir!'
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Manggarai dan Jembatan Merah berpotensi terjadi banjir!'
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Istiqlal dan Jembatan Merah berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Istiqlal dan Jembatan Merah berpotensi terjadi banjir!'

        # Jika 2 "Bahaya" 1 "Siaga" 1 "Normal"
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Normal' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'

        # Jika 2 "Bahaya" 2 "Waspada"
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'

        # Jika 2 "Bahaya" 1 "Waspada" 1 "Normal"
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Normal' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
        
        # Jika 1 "Bahaya" 3 "Siaga"
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        
        # Jika 1 "Bahaya" 2 "Siaga" 1 "Waspada"
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        
        # Jika 1 "Bahaya" 2 "Siaga" 1 "Normal"
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Siaga' and jm == 'Normal':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Normal' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Normal':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Normal' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        

        # Jika 1 "Bahaya" 1 "Siaga" 2 "Waspada"
        #Bahaya,Siaga,Waspada,Waspada
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        #Siaga,Bahaya,Waspada,Waspada
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        #Waspada,Bahaya,Siaga,Waspada
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        #Bahaya,Waspada,Siaga,Waspada
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        #Siaga,Waspada,Bahaya,Waspada
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!!'
        #Waspada,Siaga,Bahaya,Waspada
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        # Waspada,Siaga,Waspada,Bahaya
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Siaga,Waspada,Waspada,Bahaya
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Waspada,Waspada,Siaga,Bahaya
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Waspada,Bahaya,Waspada,Siaga
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        # Bahaya,Waspada,Waspada,Siaga
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        # Waspada,Waspada,Bahaya,Siaga
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        
        # Jika 1 "Bahaya" 1 "Siaga" 1 "Waspada" 1 "Normal" (UDAH BENER)
        # Normal,Siaga,Waspada,Bahaya
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Siaga,Normal,Waspada,Bahaya
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi terjadi banjir!'
        # Waspada,Normal,Siaga,Bahaya
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada Lokasi Jembatan Merah berpotensi terjadi banjir!'
        # Normal,Waspada,Siaga,Bahaya
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi terjadi banjir!'
        # Siaga,Waspada,Normal,Bahaya
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi terjadi banjir!'
        # Waspada,Siaga,Normal,Bahaya
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi terjadi banjir!'
        # Waspada,Siaga,Bahaya,Normal
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
        # Siaga,Waspada,Bahaya,Normal
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi istiqlal berpotensi terjadi banjir!'
        # Bahaya,Waspada,Siaga,Normal
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Siaga' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'
        # Waspada,Bahaya,Siaga,Normal
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Menggarai berpotensi terjadi banjir!'
        # Siaga,Bahaya,Waspada,Normal
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
        # Bahaya,Siaga,Waspada,Normal
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Waspada' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
        # Bahaya,Normal,Waspada,Siaga
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'
        # Normal,Bahaya,Waspada,Siaga
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
        # Waspada,Bahaya,Normal,Siaga
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Normal' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
        # Bahaya,Waspada,Normal,Siaga
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Normal' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'
        # Normal,Waspada,Bahaya,Siaga
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
        # Waspada,Normal,Bahaya,Siaga
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
        # Siaga,Normal,Bahaya,Waspada
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
        # Normal,Siaga,Bahaya,Waspada
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
        # Bahaya,Siaga,Normal,Waspada
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Normal' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'
        # Siaga,Bahaya,Normal,Waspada
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Normal' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
        # Normal,Bahaya,Siaga,Waspada
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
        # Bahaya,Normal,Siaga,Waspada
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'

        # Jika 1 "Bahaya" 1 "Siaga" 2 "Normal"
        # Normal,Normal,Siaga,Bahaya
        elif pd == 'Normal' and mg == 'Normal' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Normal,Bahaya,Normal,Siaga
        elif pd == 'Normal' and mg == 'Normal' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Normal,Normal,Bahaya,Siaga
        elif pd == 'Normal' and mg == 'Normal' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        # Normal,Siaga,Bahaya,Normal
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Normal,Bahaya,Siaga,Normal
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Normal' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        # Normal,Siaga,Normal,Bahaya
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        # Normal,Bahaya,Siaga,Normal
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        # Siaga,Normal,Normal,Bahaya
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Siaga,Normal,Bahaya,Normal
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        # Bahaya,Normal,Normal,Siaga
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Normal' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        # Bahaya,Normal,Siaga,Normal
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Siaga' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        # Bahaya,Siaga,Normal,Normal
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Normal' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        # Siaga,Bahaya,Normal,Normal
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Normal' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        
        # Jika 1 "Bahaya" 1 "Waspada" 2 "Normal"
        
        # Normal,Normal,Waspada,Bahaya
        elif pd == 'Normal' and mg == 'Normal' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Normal,Normal,Bahaya,Waspada
        elif pd == 'Normal' and mg == 'Normal' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        # Normal,Waspada,Normal,Bahaya
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Normal,Bahaya,Normal,Waspada
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Normal' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        # Normal,Waspada,Bahaya,Normal
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        # Normal,Bahaya,Waspada,Normal
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        # Waspada,Normal,Normal,Bahaya
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Waspada,Normal,Bahaya,Normal
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        # Bahaya,Normal,Normal,Waspada
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Normal' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        # Bahaya,Normal,Waspada,Normal
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Waspada' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        # Bahaya,Waspada,Normal,Normal
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Normal' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        # Waspada,Bahaya,Normal,Normal
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Normal' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        
        # Jika 1 "Bahaya" 3 "Waspada"
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'

        # Jika 1 "Bahaya" 3 "Normal"
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Normal' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Normal' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Normal' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Normal' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        
        # 4 Siaga
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        # 3 Siaga 1 Waspada
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        # 3 Siaga 1 Normal
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Siaga' and jm == 'Normal':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Normal' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
            
        # 2 Siaga 2 Waspada
        
        # Siaga,Siaga,Waspada,Waspada
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
        # Siaga,Waspada,Siaga,Waspada
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        # Siaga,Waspada,Waspada,Siaga
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
        # Waspada,Siaga,Siaga,Waspada
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Manggarai dan istiqlal berpotensi banjir!'
        # Waspada,Siaga,Waspada,Siaga
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
        # Waspada,Waspada,Siaga,Siaga
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'   


        # 2 Siaga 1 Waspada 1 Normal
        
        # Normal,Siaga,Siaga,Waspada
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
        # Normal,Siaga,Waspada,Siaga
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
        # Normal,Waspada,Siaga,Siaga
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
        # Siaga,Normal,Siaga,Waspada
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        # Siaga,Normal,Waspada,Siaga
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
        # Siaga,Siaga,Normal,Waspada
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Normal' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
        # Siaga,Siaga,Waspada,Normal
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Waspada' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
        # Siaga,Waspada,Normal,Siaga
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Normal' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Jembatan Merah  berpotensi banjir!'
        # Siaga,Waspada,Siaga,Normal
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Siaga' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        # Waspada,Normal,Siaga,Siaga
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
        # Waspada,Siaga,Normal,Siaga
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Normal' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
        # Waspada,Siaga,Siaga,Normal
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Siaga' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'

        # 2 Siaga 2 Normal
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Normal' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Manggarai warga perlu waspada!'
        # Normal,Waspada,Waspada,Normal
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Waspada' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Manggarai dan Istiqlal warga perlu waspada!'
        # Waspada,Normal,Waspada,Normal
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Waspada' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Istiqlal warga perlu waspada!'
        # Normal,Waspada,Normal,Waspada
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Normal' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Manggarai dan Jembatan Merah warga perlu waspada!'
        # Waspada,Normal,Normal,Waspada
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Normal' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Manggarai warga perlu waspada!'
        # Normal,Normal,Waspada,Waspada
        elif pd == 'Normal' and mg == 'Normal' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Istiqlal dan Jembatan Merah warga perlu waspada!'
            
        # 1 Siaga 3 Waspada
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!!'
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
        # 1 Siaga 3 Normal
        elif pd == 'Normal' and mg == 'Normal' and it == 'Normal' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Normal' and it == 'Siaga' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!!'
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Normal' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Normal' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
        # 2 Waspada 2 Normal
        
        # Waspada,Waspada,Normal,Normal
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Normal' and jm == 'Normal':
            pesan = '[AMAN] Pada lokasi Pos Depok dan Manggarai warga perlu waspada!'
        # Normal,Waspada,Waspada,Normal
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Waspada' and jm == 'Normal':
            pesan = '[AMAN] Pada lokasi Manggarai dan Istiqlal warga perlu waspada!'
        # Waspada,Normal,Waspada,Normal
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Waspada' and jm == 'Normal':
            pesan = '[AMAN] Pada lokasi Pos Depok dan Istiqlal warga perlu waspada!'
        # Normal,Waspada,Normal,Waspada
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Normal' and jm == 'Waspada':
            pesan = '[AMAN] Pada lokasi Manggarai dan Jembatan Merah warga perlu waspada!'
        # Waspada,Normal,Normal,Waspada
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Normal' and jm == 'Waspada':
            pesan = '[AMAN] Pada lokasi Pos Depok dan Manggarai warga perlu waspada!'
        # Normal,Normal,Waspada,Waspada
        elif pd == 'Normal' and mg == 'Normal' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[AMAN] Pada lokasi Istiqlal dan Jembatan Merah warga perlu waspada!'
            
            
        # 2 Waspada 1 Siaga 1 Normal
        
        # Waspada,Waspada,Siaga,Normal
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Siaga' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Istiqlal warga perlu waspada!'
        # Siaga,Waspada,Waspada,Normal
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Waspada' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Pos Depok warga perlu waspada!'
        # Waspada,Siaga,Waspada,Normal
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Waspada' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Manggarai warga perlu waspada!'
        # Siaga,Waspada,Normal,Waspada
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Normal' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Pos Depok warga perlu waspada!'
        # Waspada,Siaga,Normal,Waspada
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Normal' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Manggarai warga perlu waspada!'
        # Normal,Siaga,Waspada,Waspada
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Manggarai warga perlu waspada!'
        # Siaga,Normal,Waspada,Waspada
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
        # Waspada,Normal,Siaga,Waspada
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!'
        # Normal,Waspada,Siaga,Waspada
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!'
        # Waspada,Waspada,Normal,Siaga
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Normal' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Normal,Waspada,Waspada,Siaga
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Waspada,Normal,Waspada,Siaga
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'     
        # 1 Waspada 3 Normal
        elif pd == 'Normal' and mg == 'Normal' and it == 'Normal' and jm == 'Waspada':
            pesan = '[AMAN] Pada lokasi Jembatan Merah warga perlu waspada!'
        elif pd == 'Normal' and mg == 'Normal' and it == 'Waspada' and jm == 'Normal':
            pesan = '[AMAN] Pada lokasi Istiqlal warga perlu waspada!'
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Normal' and jm == 'Normal':
            pesan = '[AMAN] Pada lokasi Manggarai warga perlu waspada!'
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Normal' and jm == 'Normal':
            pesan = '[AMAN] Pada lokasi Pos Depok warga perlu waspada!'
        
        #2 Normal 1 Siaga 1 Waspada
        
        # Normal,Normal,Siaga,Waspada
        elif pd == 'Normal' and mg == 'Normal' and it == '' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Siaga,Normal,Normal,Waspada
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Normal' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
        # Normal,Siaga,Normal,Waspada
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Normal' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
        # Siaga,Normal,Waspada,Normal
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Waspada' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Pos Depok warga perlu waspada!'
        # Normal,Siaga,Waspada,Normal
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Waspada' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
        # Waspada,Siaga,Normal,Normal
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Normal' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
        # Siaga,Waspada,Normal,Normal
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Normal' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
        # Normal,Waspada,Siaga,Normal
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Siaga' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!' 
        # Waspada,Normal,Siaga,Normal
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Siaga' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!' 
        # Normal,Normal,Waspada,Siaga
        elif pd == 'Normal' and mg == 'Normal' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!' 
        # Waspada,Normal,Normal,Siaga
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Normal' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!' 
        # Normal,Waspada,Normal,Siaga
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Normal' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!' 
            
        else:
            pesan = '[AMAN] Pada lokasi Katulampa warga perlu waspada!'
    else:
        # Jika keempatnya "Bahaya"
        if pd == 'Bahaya' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        
        # Jika 3 "Bahaya" 1 "Siaga"
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        
        # Jika 3 "Bahaya" 1 "Waspada"
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        
        # Jika 3 "Bahaya" 1 "Normal"
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        
        # Jika 2 "Bahaya" 2 "Siaga"
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        
        # Jika 2 "Bahaya" 1 "Siaga" 1 "Waspada"
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pos Depok dan Manggarai berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pos Depok dan Manggarai berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pos Depok dan Istiqlal berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pos Depok dan Istiqlal berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pos Depok dan Jembatan Merah berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pos Depok dan Jembatan Merah berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Manggarai dan Istiqlal berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Manggarai dan Jembatan Merah berpotensi terjadi banjir!'
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Manggarai dan Istiqlal berpotensi terjadi banjir!'
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Manggarai dan Jembatan Merah berpotensi terjadi banjir!'
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Istiqlal dan Jembatan Merah berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Istiqlal dan Jembatan Merah berpotensi terjadi banjir!'

        # Jika 2 "Bahaya" 1 "Siaga" 1 "Normal"
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Normal' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'

        # Jika 2 "Bahaya" 2 "Waspada"
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'

        # Jika 2 "Bahaya" 1 "Waspada" 1 "Normal"
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Bahaya' and it == 'Normal' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Bahaya' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
        
        # Jika 1 "Bahaya" 3 "Siaga"
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        
        # Jika 1 "Bahaya" 2 "Siaga" 1 "Waspada"
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        
        # Jika 1 "Bahaya" 2 "Siaga" 1 "Normal"
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Siaga' and jm == 'Normal':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Normal' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Normal':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Normal' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        

        # Jika 1 "Bahaya" 1 "Siaga" 2 "Waspada"
        #Bahaya,Siaga,Waspada,Waspada
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        #Siaga,Bahaya,Waspada,Waspada
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        #Waspada,Bahaya,Siaga,Waspada
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        #Bahaya,Waspada,Siaga,Waspada
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        #Siaga,Waspada,Bahaya,Waspada
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!!'
        #Waspada,Siaga,Bahaya,Waspada
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        # Waspada,Siaga,Waspada,Bahaya
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Siaga,Waspada,Waspada,Bahaya
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Waspada,Waspada,Siaga,Bahaya
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Waspada,Bahaya,Waspada,Siaga
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        # Bahaya,Waspada,Waspada,Siaga
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        # Waspada,Waspada,Bahaya,Siaga
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        
        # Jika 1 "Bahaya" 1 "Siaga" 1 "Waspada" 1 "Normal" (UDAH BENER)
        # Normal,Siaga,Waspada,Bahaya
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Siaga,Normal,Waspada,Bahaya
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi terjadi banjir!'
        # Waspada,Normal,Siaga,Bahaya
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada Lokasi Jembatan Merah berpotensi terjadi banjir!'
        # Normal,Waspada,Siaga,Bahaya
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi terjadi banjir!'
        # Siaga,Waspada,Normal,Bahaya
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi terjadi banjir!'
        # Waspada,Siaga,Normal,Bahaya
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi terjadi banjir!'
        # Waspada,Siaga,Bahaya,Normal
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
        # Siaga,Waspada,Bahaya,Normal
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi istiqlal berpotensi terjadi banjir!'
        # Bahaya,Waspada,Siaga,Normal
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Siaga' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'
        # Waspada,Bahaya,Siaga,Normal
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Menggarai berpotensi terjadi banjir!'
        # Siaga,Bahaya,Waspada,Normal
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
        # Bahaya,Siaga,Waspada,Normal
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Waspada' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
        # Bahaya,Normal,Waspada,Siaga
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'
        # Normal,Bahaya,Waspada,Siaga
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
        # Waspada,Bahaya,Normal,Siaga
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Normal' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
        # Bahaya,Waspada,Normal,Siaga
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Normal' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'
        # Normal,Waspada,Bahaya,Siaga
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
        # Waspada,Normal,Bahaya,Siaga
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
        # Siaga,Normal,Bahaya,Waspada
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
        # Normal,Siaga,Bahaya,Waspada
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi terjadi banjir!'
        # Bahaya,Siaga,Normal,Waspada
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Normal' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'
        # Siaga,Bahaya,Normal,Waspada
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Normal' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
        # Normal,Bahaya,Siaga,Waspada
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi terjadi banjir!'
        # Bahaya,Normal,Siaga,Waspada
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi terjadi banjir!'

        # Jika 1 "Bahaya" 1 "Siaga" 2 "Normal"
        # Normal,Normal,Siaga,Bahaya
        elif pd == 'Normal' and mg == 'Normal' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Normal,Bahaya,Normal,Siaga
        elif pd == 'Normal' and mg == 'Normal' and it == 'Siaga' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Normal,Normal,Bahaya,Siaga
        elif pd == 'Normal' and mg == 'Normal' and it == 'Bahaya' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        # Normal,Siaga,Bahaya,Normal
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Normal,Bahaya,Siaga,Normal
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Normal' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        # Normal,Siaga,Normal,Bahaya
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        # Normal,Bahaya,Siaga,Normal
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Siaga' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        # Siaga,Normal,Normal,Bahaya
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Siaga,Normal,Bahaya,Normal
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        # Bahaya,Normal,Normal,Siaga
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Normal' and jm == 'Siaga':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        # Bahaya,Normal,Siaga,Normal
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Siaga' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        # Bahaya,Siaga,Normal,Normal
        elif pd == 'Bahaya' and mg == 'Siaga' and it == 'Normal' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        # Siaga,Bahaya,Normal,Normal
        elif pd == 'Siaga' and mg == 'Bahaya' and it == 'Normal' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        
        # Jika 1 "Bahaya" 1 "Waspada" 2 "Normal"
        
        # Normal,Normal,Waspada,Bahaya
        elif pd == 'Normal' and mg == 'Normal' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Normal,Normal,Bahaya,Waspada
        elif pd == 'Normal' and mg == 'Normal' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        # Normal,Waspada,Normal,Bahaya
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Normal,Bahaya,Normal,Waspada
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Normal' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        # Normal,Waspada,Bahaya,Normal
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        # Normal,Bahaya,Waspada,Normal
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        # Waspada,Normal,Normal,Bahaya
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Waspada,Normal,Bahaya,Normal
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        # Bahaya,Normal,Normal,Waspada
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Normal' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        # Bahaya,Normal,Waspada,Normal
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Waspada' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        # Bahaya,Waspada,Normal,Normal
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Normal' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        # Waspada,Bahaya,Normal,Normal
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Normal' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        
        # Jika 1 "Bahaya" 3 "Waspada"
        elif pd == 'Bahaya' and mg == 'Waspada' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        elif pd == 'Waspada' and mg == 'Bahaya' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Bahaya' and jm == 'Waspada':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Waspada' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'

        # Jika 1 "Bahaya" 3 "Normal"
        elif pd == 'Bahaya' and mg == 'Normal' and it == 'Normal' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Pos Depok berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Bahaya' and it == 'Normal' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Manggarai berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Normal' and it == 'Bahaya' and jm == 'Normal':
            pesan = '[EVAKUASI] Pada lokasi Istiqlal berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Normal' and it == 'Normal' and jm == 'Bahaya':
            pesan = '[EVAKUASI] Pada lokasi Jembatan Merah berpotensi banjir!'
        
        # 4 Siaga
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        # 3 Siaga 1 Waspada
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        # 3 Siaga 1 Normal
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Siaga' and jm == 'Normal':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Normal' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[EVAKUASI] DAS Ciliwung berpotensi terjadi banjir!'
        


        # 2 Siaga 1 Waspada 1 Normal
        
        # Normal,Siaga,Siaga,Waspada
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
        # Normal,Siaga,Waspada,Siaga
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'
        # Normal,Waspada,Siaga,Siaga
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
        # Siaga,Normal,Siaga,Waspada
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        # Siaga,Normal,Waspada,Siaga
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
        # Siaga,Siaga,Normal,Waspada
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Normal' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
        # Siaga,Siaga,Waspada,Normal
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Waspada' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
        # Siaga,Waspada,Normal,Siaga
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Normal' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Jembatan Merah  berpotensi banjir!'
        # Siaga,Waspada,Siaga,Normal
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Siaga' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        # Waspada,Normal,Siaga,Siaga
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
        # Waspada,Siaga,Normal,Siaga
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Normal' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
        # Waspada,Siaga,Siaga,Normal
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Siaga' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Manggarai dan Istiqlal berpotensi banjir!'

        # 2 Siaga 2 Waspada
        
        # Siaga,Siaga,Waspada,Waspada
        elif pd == 'Siaga' and mg == 'Siaga' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Manggarai berpotensi banjir!'
        # Siaga,Waspada,Siaga,Waspada
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Istiqlal berpotensi banjir!'
        # Siaga,Waspada,Waspada,Siaga
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Pos Depok dan Jembatan Merah berpotensi banjir!'
        # Waspada,Siaga,Siaga,Waspada
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Manggarai dan istiqlal berpotensi banjir!'
        # Waspada,Siaga,Waspada,Siaga
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Manggarai dan Jembatan Merah berpotensi banjir!'
        # Waspada,Waspada,Siaga,Siaga
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Siaga' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Istiqlal dan Jembatan Merah berpotensi banjir!'
        
        # 2 Waspada 1 Siaga 1 Normal
        
        # Waspada,Waspada,Siaga,Normal
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Siaga' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!'
        # Siaga,Waspada,Waspada,Normal
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Waspada' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
        # Waspada,Siaga,Waspada,Normal
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Waspada' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
        # Siaga,Waspada,Normal,Waspada
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Normal' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
        # Waspada,Siaga,Normal,Waspada
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Normal' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
        # Normal,Siaga,Waspada,Waspada
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
        # Siaga,Normal,Waspada,Waspada
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
        # Waspada,Normal,Siaga,Waspada
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!'
        # Normal,Waspada,Siaga,Waspada
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!'
        # Waspada,Waspada,Normal,Siaga
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Normal' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Normal,Waspada,Waspada,Siaga
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Waspada,Normal,Waspada,Siaga
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
            
        #2 Normal 1 Siaga 1 Waspada
        
        # Normal,Normal,Siaga,Waspada
        elif pd == 'Normal' and mg == 'Normal' and it == '' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
        # Siaga,Normal,Normal,Waspada
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Normal' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
        # Normal,Siaga,Normal,Waspada
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Normal' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
        # Siaga,Normal,Waspada,Normal
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Waspada' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Pos Depok warga perlu waspada!'
        # Normal,Siaga,Waspada,Normal
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Waspada' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
        # Waspada,Siaga,Normal,Normal
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Normal' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
        # Siaga,Waspada,Normal,Normal
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Normal' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
        # Normal,Waspada,Siaga,Normal
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Siaga' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!' 
        # Waspada,Normal,Siaga,Normal
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Siaga' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!' 
        # Normal,Normal,Waspada,Siaga
        elif pd == 'Normal' and mg == 'Normal' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!' 
        # Waspada,Normal,Normal,Siaga
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Normal' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!' 
        # Normal,Waspada,Normal,Siaga
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Normal' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
        
        # 1 Siaga 3 Waspada
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Waspada' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Siaga' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!!'
        elif pd == 'Waspada' and mg == 'Siaga' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
        elif pd == 'Siaga' and mg == 'Waspada' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
        # 1 Siaga 3 Normal
        elif pd == 'Normal' and mg == 'Normal' and it == 'Normal' and jm == 'Siaga':
            pesan = '[AWAS] Pada lokasi Jembatan Merah berpotensi banjir!'
        elif pd == 'Normal' and mg == 'Normal' and it == 'Siaga' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Istiqlal berpotensi banjir!!'
        elif pd == 'Normal' and mg == 'Siaga' and it == 'Normal' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Manggarai berpotensi banjir!'
        elif pd == 'Siaga' and mg == 'Normal' and it == 'Normal' and jm == 'Normal':
            pesan = '[AWAS] Pada lokasi Pos Depok berpotensi banjir!'
        # 2 Waspada 2 Normal
        
        # Waspada,Waspada,Normal,Normal
        elif pd == 'Waspada' and mg == 'Waspada' and it == 'Normal' and jm == 'Normal':
            pesan = '[AMAN] Pada lokasi Pos Depok dan Manggarai warga perlu waspada!'
        # Normal,Waspada,Waspada,Normal
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Waspada' and jm == 'Normal':
            pesan = '[AMAN] Pada lokasi Manggarai dan Istiqlal warga perlu waspada!'
        # Waspada,Normal,Waspada,Normal
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Waspada' and jm == 'Normal':
            pesan = '[AMAN] Pada lokasi Pos Depok dan Istiqlal warga perlu waspada!'
        # Normal,Waspada,Normal,Waspada
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Normal' and jm == 'Waspada':
            pesan = '[AMAN] Pada lokasi Manggarai dan Jembatan Merah warga perlu waspada!'
        # Waspada,Normal,Normal,Waspada
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Normal' and jm == 'Waspada':
            pesan = '[AMAN] Pada lokasi Pos Depok dan Manggarai warga perlu waspada!'
        # Normal,Normal,Waspada,Waspada
        elif pd == 'Normal' and mg == 'Normal' and it == 'Waspada' and jm == 'Waspada':
            pesan = '[AMAN] Pada lokasi Istiqlal dan Jembatan Merah warga perlu waspada!'
        
        # 1 Waspada 3 Normal
        elif pd == 'Normal' and mg == 'Normal' and it == 'Normal' and jm == 'Waspada':
            pesan = '[AMAN] Pada lokasi Jembatan Merah warga perlu waspada!'
        elif pd == 'Normal' and mg == 'Normal' and it == 'Waspada' and jm == 'Normal':
            pesan = '[AMAN] Pada lokasi Istiqlal warga perlu waspada!'
        elif pd == 'Normal' and mg == 'Waspada' and it == 'Normal' and jm == 'Normal':
            pesan = '[AMAN] Pada lokasi Manggarai warga perlu waspada!'
        elif pd == 'Waspada' and mg == 'Normal' and it == 'Normal' and jm == 'Normal':
            pesan = '[AMAN] Pada lokasi Pos Depok warga perlu waspada!'
        else:
            pesan = '[AMAN] DAS Ciliwung tidak memiliki potensi banjir!'
    return pesan

print('''
=============================================================
っ◔ ◡ ◔ )っ  ♥  Early Warning System (Banjir Sungai Ciliwung)
=============================================================
''')

with open("data.json", "r") as data:
    data = json.load(data)
    for i in range(len(data)):
        if i == 0:
            continue
        else:
            # Kondisi awal ketinggian lokasi pemantauan
            KatulampaAwal       = data[i-1]['Katulampa']
            PosDepokAwal        = data[i-1]['Pos Depok']
            ManggaraiAwal       = data[i-1]['Manggarai']
            IstiqlalAwal        = data[i-1]['Istiqlal']
            JembatanMerahAwal   = data[i-1]['Jembatan Merah']
            
            # Status pada kondisi ketinggian awal
            statusKatulampaAwal     = Katulampa(KatulampaAwal)
            statusPosDepokAwal      = PosDepok(PosDepokAwal)
            statusManggaraiAwal     = Manggarai(ManggaraiAwal)
            statusIstiqlalAwal      = Istiqlal(IstiqlalAwal)
            statusJembatanMerahAwal = JembatanMerah(JembatanMerahAwal)
            
            # Kondisi ketinggian lokasi pemantauan saat ini
            KatulampaSekarang     = data[i]['Katulampa']
            PosDepokSekarang      = data[i]['Pos Depok']
            ManggaraiSekarang     = data[i]['Manggarai']
            IstiqlalSekarang      = data[i]['Istiqlal']
            JembatanMerahSekarang = data[i]['Jembatan Merah']
            
            # Status ketinggian lokasi pemantauan saat ini
            statusKatulampaSekarang     = Katulampa(KatulampaSekarang)
            statusPosDepokSekarang      = PosDepok(PosDepokSekarang)
            statusManggaraiSekarang     = Manggarai(ManggaraiSekarang)
            statusIstiqlalSekarang      = Istiqlal(IstiqlalSekarang)
            statusJembatanMerahSekarang = JembatanMerah(JembatanMerahSekarang)
            
            # Perhitungan ketinggian lokasi pemantauan selanjutnya (Menggunakan pemanggilan fungsi)
            prediksiKatulampa       = prediksiKetinggian(KatulampaAwal,KatulampaSekarang)
            prediksiPosDepok        = prediksiKetinggian(PosDepokAwal,PosDepokSekarang)
            prediksiManggarai       = prediksiKetinggian(ManggaraiAwal,ManggaraiSekarang)
            prediksiIstiqlal        = prediksiKetinggian(IstiqlalAwal,IstiqlalSekarang)
            prediksiJembatanMerah   = prediksiKetinggian(JembatanMerahAwal,JembatanMerahSekarang)
            
            # Status dari prediksi ketinggian lokasi pemantauan
            statusPrediksiKatulampa     = Katulampa(prediksiKetinggian(KatulampaAwal, KatulampaSekarang))
            statusPrediksiPosDepok      = PosDepok(prediksiKetinggian(PosDepokAwal, PosDepokSekarang))
            statusPrediksiManggarai     = Manggarai(prediksiKetinggian(ManggaraiAwal, ManggaraiSekarang))
            statusPrediksiIstiqlal      = Istiqlal(prediksiKetinggian(IstiqlalAwal, IstiqlalSekarang))
            statusPrediksiJembatanMerah = JembatanMerah(prediksiKetinggian(JembatanMerahAwal, JembatanMerahSekarang))
            
            # Cetak output
            print("Data ke-" + str(i))
            print("Waktu : " + str(data[i]['Tanggal']) + " - " + str(data[i]['Waktu']))
            print("=============================")
            print("Ketinggian Data Saat Ini    : %-10s %-10s %-10s %-10s %-10s" % (KatulampaSekarang, PosDepokSekarang, ManggaraiSekarang, IstiqlalSekarang, JembatanMerahSekarang))
            print("Status Data Saat Ini        : %-10s %-10s %-10s %-10s %-10s" % (statusKatulampaSekarang, statusPosDepokSekarang, statusManggaraiSekarang, statusIstiqlalSekarang, statusJembatanMerahSekarang))
            print("=============================")
            print("Ketinggian Data Sebelumnya  : %-10s %-10s %-10s %-10s %-10s" % (KatulampaAwal, PosDepokAwal, ManggaraiAwal, IstiqlalAwal, JembatanMerahAwal))
            print("Status Data Sebelumnya      : %-10s %-10s %-10s %-10s %-10s" % (statusKatulampaAwal, statusPosDepokAwal, statusManggaraiAwal, statusIstiqlalAwal, statusJembatanMerahAwal))
            print("=============================")
            print("Prediksi Ketinggian         : %-10s %-10s %-10s %-10s %-10s" % (prediksiKatulampa, prediksiPosDepok, prediksiManggarai, prediksiIstiqlal, prediksiJembatanMerah))
            print("Data Prediksi Selanjutnya   : %-10s %-10s %-10s %-10s %-10s" % (statusPrediksiKatulampa, statusPrediksiPosDepok, statusPrediksiManggarai, statusPrediksiIstiqlal, statusPrediksiJembatanMerah))
            print("=============================")
            print("Hasil Prediksi              :", prediksiBanjir(statusPrediksiKatulampa, statusPrediksiPosDepok, statusPrediksiManggarai, statusPrediksiIstiqlal, statusPrediksiJembatanMerah))
            print()
            time.sleep(10)