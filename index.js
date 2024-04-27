var sheetName = 'Generated'
var scriptProp = PropertiesService.getScriptProperties()

function intialSetup () {
  var activeSpreadsheet = SpreadsheetApp.getActiveSpreadsheet()
  scriptProp.setProperty('key', activeSpreadsheet.getId())
}

function getCurrencyIdr(x) {
  let phold = x.toString();
  let res = 'Rp ' + phold.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  return res;
}

function doPost (e) {
  var lock = LockService.getScriptLock()
  lock.tryLock(10000)

  try {
    var docx = SpreadsheetApp.openById(scriptProp.getProperty('key'))
    var sheetx = docx.getSheetByName(sheetName)

    var headers = sheetx.getRange(1, 1, 1, sheetx.getLastColumn()).getValues()[0]
    var nextRow = sheetx.getLastRow() + 1

    var newRow = headers.map(function(header) {
      return header === 'timestamp' ? new Date() : e.parameter[header]
    })

    sheetx.getRange(nextRow, 1, 1, newRow.length).setValues([newRow])

    //generate pdf
    const googleDocTemplate = DriveApp.getFileById('1kCB2FzgVuwJMIylAscm56hgn_j7gbGpK20wcr0cm0AQ');

    const destinationDocFolder = DriveApp.getFolderById('1gkFdn5uqggyatPAtun1frhqRF-HhJxFJ');
    const destinationPdfFolder = DriveApp.getFolderById('1aiTP5c7qYMCGT8iRU9T4CNKxBa_ceqVP');

    const sheet = SpreadsheetApp.getActiveSpreadsheet().getSheetByName('Generated')
    const rows = sheet.getDataRange().getValues();
  
    // Mulai memproses setiap baris spreadsheet
    rows.forEach(function(row, index){
    // Di sini kita memeriksa apakah baris ini adalah header, jika ya kita lewati
    if (index === 0) return;
    // Di sini kita memeriksa apakah dokumen sudah dibuat dengan melihat 'Document Link', jika ya kita lewati
    if (row[15]) return;
    // Menggunakan data baris dalam template literal, kita membuat salinan dokumen template kita di folder tujuan
    const copyDoc = googleDocTemplate.makeCopy(`${row[0]} - ${row[2]} - Duluin Gajian` , destinationDocFolder);
    // Setelah kita memiliki salinannya, kita kemudian membukanya menggunakan DocumentApp
    const doc = DocumentApp.openById(copyDoc.getId());
    // Semua konten berada di dalam body, jadi kita dapatkan itu untuk diedit
    const body = doc.getBody();
    // Di baris ini kita melakukan format tanggal yang ramah, mungkin atau mungkin tidak cocok dengan lokal Anda
    const fdate_raw = new Date(row[1]);
    const fdate_raw0 = Utilities.formatDate(fdate_raw, 'Asia/Jakarta', 'EEEE, dd MMMM yyyy');
    const friendlyDate = LanguageApp.translate(fdate_raw0, 'en', 'id')
    console.log(friendlyDate);

    // Di baris ini kita mengambil format mata uang Rp
    const nominal = getCurrencyIdr(row[6]);

    // Di baris ini, kita mengganti token pengganti kita dengan nilai dari baris spreadsheet kita
    body.replaceText('{{no agreement}}', row[0]);
    body.replaceText('{{tanggal perjanjian}}', friendlyDate);
    body.replaceText('{{NAME}}', row[2]);
    body.replaceText('{{Name Proper}}', row[3]);
    body.replaceText('{{NIK}}', row[4]);
    body.replaceText('{{alamat}}', row[5]);
    body.replaceText('{{nominal}}', nominal);
    body.replaceText('{{terbilang}}', row[7]);
    body.replaceText('{{period}}', row[8]);
    body.replaceText('{{tanggal investment}}', row[9]);
    body.replaceText('{{no rekening}}', row[10]);
    body.replaceText('{{nama bank}}', row[11]);
    body.replaceText('{{nama rekening}}', row[12]);
    body.replaceText('{{phone}}', row[13]);
    body.replaceText('{{email}}', row[14]); 
    
    doc.saveAndClose();
    const url = doc.getUrl();
    const convertPdf = doc.getAs(MimeType.PDF);
    const pdfFile = destinationPdfFolder.createFile(convertPdf).setName(`${row[0]} - ${row[2]} - Duluin Gajian`);
    const pdfUrl = pdfFile.getUrl();
    sheet.getRange(index + 1, 16).setValue(pdfUrl);

    const subject = 'Add Fund Invesmtent';
    const isi = 
    `
    Halo Bapak/Ibu PT Rasa Aksata Nusantara,

    PT Rasa Aksata Nusantara telah mengirimkan Perjanjian Investasi untuk Anda, dengan rincian sebagai berikut:

    Nama : ${row[2]}
    Nominal : ${nominal}
    Tanggal : ${friendlyDate}
    Periode : ${row[8]}

    Realisasi penempatan melalui rekening : 
    PT Rasa Aksata Nusantara
    Bank : Bank Mandiri
    Rekening : 1300003366880

    Jika ada pertanyaan lebih lanjut, silakan menghubungi PT Rasa Aksata Nusantara di:

    No. Telp: 08170031000

    Terima kasih.
    `;
    const recipientEmail = row[14]; // Ubah indeks kolom ini sesuai dengan kolom email di spreadsheet Anda
    MailApp.sendEmail(recipientEmail, subject, isi);
    })

    return ContentService
      .createTextOutput(JSON.stringify({ 'result': 'success', 'row': nextRow }))
      .setMimeType(ContentService.MimeType.JSON)
  }

  catch (e) {
    return ContentService
      .createTextOutput(JSON.stringify({ 'result': 'error', 'error': e }))
      .setMimeType(ContentService.MimeType.JSON)
  }

  finally {
    lock.releaseLock()
  }
}
