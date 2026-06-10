# WhatsApp Notification Setup Guide

## Overview
This application is configured to send WhatsApp notifications when new contact messages are received. You can receive notifications automatically and also manually send WhatsApp messages from the admin panel.

## Setup Instructions

### 1. Get WhatsApp API Credentials

You have two options:

#### Option A: WhatsApp Cloud API (Meta/Official)
1. Go to [Facebook Business Suite](https://business.facebook.com/)
2. Create a business account if you don't have one
3. Go to [WhatsApp Business Platform](https://www.whatsapp.com/business/)
4. Click "Get Started"
5. Follow the setup wizard to:
   - Verify your business
   - Create a WhatsApp Business Account
   - Set up a messaging app
6. Once set up, you'll get:
   - Phone Number ID
   - Access Token
   - Your WhatsApp Business Phone Number

#### Option B: Third-Party WhatsApp API Services
If you prefer a third-party service, you can use:
- **Twilio WhatsApp API**
- **WhatsApp Web API providers**
- **MessageBird**
- Other providers

### 2. Configure Environment Variables

Edit your `.env` file and add:

```env
# WhatsApp Configuration
WHATSAPP_API_URL=https://graph.instagram.com/v18.0/YOUR_PHONE_ID/messages
WHATSAPP_API_KEY=your_access_token_here
WHATSAPP_PHONE_NUMBER=62812345678901
```

**Example with real Meta API:**
```env
WHATSAPP_API_URL=https://graph.instagram.com/v18.0/123456789/messages
WHATSAPP_API_KEY=EAAxxxxxxxxxxxxxx
WHATSAPP_PHONE_NUMBER=6281234567890
```

### 3. Phone Number Format

The system automatically formats phone numbers to international format:
- `0812345678` → `6281234567890` (adds Indonesia country code: 62)
- `812345678` → `6281234567890` (adds Indonesia country code: 62)
- `6281234567890` → `6281234567890` (already formatted)

If you're in a different country, modify the country code (62) in `app/Services/WhatsAppService.php`.

## Features

### Automatic Notifications
When a user submits a contact form:
1. Message is saved to the database
2. File attachment is stored (if provided)
3. **WhatsApp notification is automatically sent** to the configured phone number

### Admin Manual Sending
From the admin panel (`/admin/contacts`):
1. View contact message details
2. If the sender provided a phone number, a "Kirim WhatsApp" button will appear
3. Click to send WhatsApp notification about the message

### Attachment Support
- Users can upload files (JPG, PNG, GIF, PDF, DOC, DOCX, XLS, XLSX, TXT, ZIP)
- Files are stored in `storage/app/contact-attachments/`
- Admin can download attachments from the contact detail page
- Notification mentions if attachment is present

## WhatsApp Message Format

Notifications are formatted with:
- 🔔 Message title
- 👤 Sender name
- 📧 Sender email
- 📱 Sender phone
- 📝 Subject
- 💬 Full message content
- 📎 Attachment indicator (if present)
- ⏰ Timestamp (Jakarta timezone)

Example:
```
🔔 *Pesan Kontak Baru*

👤 *Nama:* John Doe
📧 *Email:* john@example.com
📱 *Telepon:* 62812345678
📝 *Subjek:* Website Inquiry

💬 *Pesan:*
I'm interested in your services...
📎 Lampiran: Ada

⏰ *Waktu:* 10 Jun 2026, 14:30
```

## Testing

To test the WhatsApp integration:

1. **Via Contact Form:**
   - Go to the home page
   - Fill out the contact form
   - Click "Kirim Pesan Sekarang"
   - Check your WhatsApp for the notification

2. **Via Admin Panel:**
   - Log in to `/admin`
   - Go to "Contacts"
   - Open a contact message
   - Click "Kirim WhatsApp" button
   - Check WhatsApp for the notification

## Troubleshooting

### Message not being sent?

1. **Check configuration in `.env`:**
   ```bash
   php artisan config:clear
   ```

2. **Verify credentials:**
   - Make sure WHATSAPP_API_URL is correct
   - Make sure WHATSAPP_API_KEY is valid
   - Make sure WHATSAPP_PHONE_NUMBER is in correct format

3. **Check logs:**
   ```bash
   tail -f storage/logs/laravel.log
   ```

4. **Test API directly:**
   - Use Postman or cURL to test the WhatsApp API endpoint
   - Verify your access token is still valid

### Wrong phone number format?

- Edit the `formatPhoneNumber()` method in `app/Services/WhatsAppService.php`
- Update the country code (currently set to 62 for Indonesia)
- Clear cache: `php artisan config:clear`

### API Rate Limiting?

- Check your WhatsApp API provider's rate limits
- Consider implementing a queue for sending messages
- Update `QUEUE_CONNECTION` in `.env` to use `database`

## Files Modified

- `.env` - WhatsApp configuration
- `config/services.php` - Service configuration
- `app/Services/WhatsAppService.php` - WhatsApp integration service
- `app/Http/Controllers/HomeController.php` - Send notification on form submission
- `app/Http/Controllers/Admin/ContactController.php` - Admin WhatsApp sending
- `routes/web.php` - WhatsApp send route
- `resources/views/admin/contacts/show.blade.php` - Admin UI button

## Support

For issues with:
- **Meta WhatsApp API:** See [Meta Developer Docs](https://developers.facebook.com/docs/whatsapp)
- **Twilio WhatsApp:** See [Twilio Docs](https://www.twilio.com/en-us/messaging/whatsapp)
- **Application:** Check Laravel logs or contact support
