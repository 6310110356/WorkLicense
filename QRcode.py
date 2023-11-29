import qrcode

# URL ของเว็บแอปพลิเคชัน
url = "http://localhost:3000/Test.php"

# สร้าง QR code
qr = qrcode.QRCode(
    version=1,
    error_correction=qrcode.constants.ERROR_CORRECT_L,
    box_size=10,
    border=4,
)
qr.add_data(url)
qr.make(fit=True)

# สร้างภาพ QR code
img = qr.make_image(fill_color="black", back_color="white")

# บันทึกภาพ QR code เป็นไฟล์
img.save("qr_code.png")
