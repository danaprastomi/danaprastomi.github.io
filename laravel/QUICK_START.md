# 🚀 Quick Start Guide - WhatsApp Notifications & File Attachments

## What's New?

Your Laravel application now has:
1. ✅ **File Attachment Support** - Users can upload files (images/documents) with contact messages
2. ✅ **WhatsApp Notifications** - Admin receives WhatsApp notifications when new messages arrive
3. ✅ **Admin Controls** - Admins can manually send WhatsApp messages and download attachments

---

## 🎯 Quick Setup (5 minutes)

### Step 1: Get WhatsApp Credentials
1. Go to [Facebook Business Suite](https://business.facebook.com/)
2. Set up WhatsApp Business Platform
3. Note your:
   - **Phone Number ID** (e.g., `123456789`)
   - **Access Token** (e.g., `EAAxxxxxxxx`)
   - **WhatsApp Business Phone Number** (e.g., `6281234567890`)

### Step 2: Update `.env` File
Edit `.env` and add these lines:

```env
WHATSAPP_API_URL=https://graph.instagram.com/v18.0/123456789/messages
WHATSAPP_API_KEY=EAAxxxxxxxx
WHATSAPP_PHONE_NUMBER=6281234567890
```

### Step 3: Clear Cache
```bash
php artisan config:clear
php artisan cache:clear
```

**Done!** ✅

---

## 📱 How It Works

### For Website Users:

1. User visits contact page
2. Fills form (name, email, message)
3. **Optionally uploads a file** (JPG, PNG, PDF, etc.)
4. Clicks "Kirim Pesan Sekarang"
5. ✅ Message is saved
6. ✅ **WhatsApp notification is sent automatically** to admin

### For Admin:

1. Log in to `/admin`
2. Go to "Contacts" menu
3. Click on any message to view details
4. Can:
   - **📥 Download file attachment**
   - **💬 Send WhatsApp message** (green button)
   - **📧 Reply via Email**
   - **🗑️ Delete message**

---

## 📋 WhatsApp Button Location

When viewing a contact in `/admin/contacts/show`:

```
┌─────────────────────────────────┐
│         Pesan Masuk              │
├─────────────────────────────────┤
│ From: John Doe (john@email.com)  │
│ Phone: 0812345678               │
│                                  │
│ Subject: Website Inquiry         │
│ Message: ...                     │
│                                  │
│ Attachment: [Download]          │
├─────────────────────────────────┤
│ [Hapus Pesan] [Kirim WhatsApp]   │  ← Green button
│              [Balas Email]       │
└─────────────────────────────────┘
```

---

## ✨ Features

### File Support
- **Allowed types:** JPG, PNG, GIF, PDF, DOC, DOCX, XLS, XLSX, TXT, ZIP
- **Max size:** 5MB per file
- **Storage:** Secure storage directory (not public)
- **Download:** Admin can download from contact details

### WhatsApp Messages Include:
- 👤 Sender name
- 📧 Sender email
- 📱 Sender phone
- 📝 Subject line
- 💬 Full message content
- 📎 Attachment indicator
- ⏰ Timestamp

### Automatic vs Manual:
- **Automatic:** Sent when form is submitted
- **Manual:** Admin can resend from admin panel anytime

---

## 🧪 Test It Now

### Test Contact Submission:
1. Go to home page
2. Scroll to "Hubungi Kami" section
3. Fill out contact form
4. Upload a test image/PDF
5. Click "Kirim Pesan Sekarang"
6. **Wait for WhatsApp notification** 📱

### Check Admin Panel:
1. Log in to `/admin`
2. Click "Contacts" in sidebar
3. Click on the contact you just created
4. You should see:
   - All contact details
   - Download button for your file
   - "Kirim WhatsApp" button (green)

---

## ⚙️ Configuration Reference

### Environment Variables

| Variable | Description | Example |
|----------|-------------|---------|
| `WHATSAPP_API_URL` | WhatsApp API endpoint | `https://graph.instagram.com/v18.0/123456789/messages` |
| `WHATSAPP_API_KEY` | Access token for API | `EAAxxxxxxxxxxxxxxx` |
| `WHATSAPP_PHONE_NUMBER` | Admin's WhatsApp number | `6281234567890` |

### Phone Number Format

The system accepts:
- ✅ `0812345678` → converted to `6281234567890`
- ✅ `812345678` → converted to `6281234567890`
- ✅ `6281234567890` → used as-is

**Note:** Adjust country code (62) if not using Indonesia

---

## 🆘 Common Issues

### "WhatsApp notification not received?"

**Checklist:**
- [ ] Check `.env` has correct values
- [ ] Run `php artisan config:clear`
- [ ] Verify phone number format is correct
- [ ] Check WhatsApp API credentials are valid
- [ ] Check application logs: `tail -f storage/logs/laravel.log`

### "Can't download attachment?"

- Verify file exists in `storage/app/contact-attachments/`
- Run `php artisan storage:link`
- Check file permissions (should be readable)

### "File upload fails?"

- Check file size (max 5MB)
- Check file type is in allowed list
- Verify `storage` directory has write permissions

---

## 📚 Documentation Files

| File | Purpose |
|------|---------|
| `WHATSAPP_SETUP.md` | Detailed setup and troubleshooting guide |
| `IMPLEMENTATION_SUMMARY.md` | Complete feature documentation |
| `QUICK_START.md` | This file - getting started |

---

## 🔍 What Changed?

### New Service:
- `app/Services/WhatsAppService.php` - Handles WhatsApp API communication

### Updated Controllers:
- `HomeController.php` - Sends notification on form submission
- `ContactController.php` - Added WhatsApp sending functionality

### Updated Views:
- `admin/contacts/show.blade.php` - Added "Kirim WhatsApp" button
- `home.blade.php` - Added file upload input

### Database:
- New migration adds `attachment` column to `contacts` table

---

## 📞 Support Resources

For help with:
- **WhatsApp API issues:** Check `WHATSAPP_SETUP.md`
- **Laravel issues:** Check `IMPLEMENTATION_SUMMARY.md`
- **General questions:** Check application logs

---

## ✅ You're All Set!

Your contact form now has:
- 📁 File attachment support
- 💬 WhatsApp notifications
- 👨‍💼 Admin controls

Start receiving contact messages on WhatsApp! 🎉
