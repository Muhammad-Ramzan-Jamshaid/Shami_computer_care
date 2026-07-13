@extends('layouts.app')

@section('title', 'Contact Us - Shami Computer Care & CCTV Cameras')

@section('content')

    <!-- Contact Hero Header -->
    <section class="hero" style="padding-top: 150px; padding-bottom: 50px; text-align: center;">
        <div class="container">
            <span class="badge">Get in Touch</span>
            <h1 style="font-size: 3rem; margin-bottom: 10px;">Contact Shami Computer Care</h1>
            <p class="max-w-600" style="color: var(--text-muted);">Have questions about our laptops, peripherals, or looking to schedule a professional CCTV camera site survey? Reach out to our technical team.</p>
        </div>
    </section>

    <!-- Contact Content Grid -->
    <section class="contact-details-section section-padding" style="background-color: var(--bg-light); border-top: 1px solid var(--border-color);">
        <div class="container grid grid-2">
            <!-- Contact Info & Map -->
            <div>
                <h2 style="font-size: 2rem; margin-bottom: 20px;">Contact Information</h2>
                <p style="margin-bottom: 30px; max-width: 500px;">Visit our retail shop or contact us via phone or email. We look forward to supplying your next IT assets or securing your premises.</p>
                
                <div class="contact-info-list" style="margin-bottom: 40px;">
                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fa-solid fa-location-dot"></i></div>
                        <div class="contact-info-text">
                            <h4>Retail Location</h4>
                            <p><a href="https://www.google.com/maps/place/Shami+Computer+Care/@31.7544355,73.8173093,13z/data=!4m6!3m5!1s0x3918bfb41d6aaa1f:0x16338d2fa58e77e3!8m2!3d31.7414756!4d73.8287892!16s%2Fg%2F11vf3s9gkg" target="_blank" style="color: var(--primary-color); font-weight: 600;">near Habib Shah Hospital, Farooqabad, Pakistan <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75rem; margin-left: 4px;"></i></a></p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fa-solid fa-phone"></i></div>
                        <div class="contact-info-text">
                            <h4>Phone Hotline & WhatsApp</h4>
                            <p>+92 306 4565908</p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fa-solid fa-envelope"></i></div>
                        <div class="contact-info-text">
                            <h4>Email Queries</h4>
                            <p>info@shamipccctv.com</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fa-solid fa-clock"></i></div>
                        <div class="contact-info-text">
                            <h4>Business Hours</h4>
                            <p>Monday - Sunday: 8:30 AM - 9:00 PM (Open 7 Days a week)</p>
                        </div>
                    </div>
                </div>

                <!-- Custom Clickable Styled Map Block -->
                <a href="https://www.google.com/maps/place/Shami+Computer+Care/@31.7544355,73.8173093,13z/data=!4m6!3m5!1s0x3918bfb41d6aaa1f:0x16338d2fa58e77e3!8m2!3d31.7414756!4d73.8287892!16s%2Fg%2F11vf3s9gkg" target="_blank" style="display: block; position: relative; text-decoration: none; margin-bottom: 15px;">
                    <!-- Transparent Interactive Hover Overlay -->
                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 10; cursor: pointer; border-radius: var(--radius-md); transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='rgba(14, 165, 233, 0.05)'" onmouseout="this.style.backgroundColor='transparent'"></div>
                    
                    <div class="map-container" style="border-radius: var(--radius-md); overflow: hidden; border: 4px solid var(--bg-white); box-shadow: var(--shadow-lg); height: 280px; position: relative; z-index: 1;">
                        <iframe src="https://maps.google.com/maps?q=Shami%20Computer%20Care,Farooqabad&t=&z=15&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </a>
                
                <!-- Direct Directions Button -->
                <a href="https://www.google.com/maps/place/Shami+Computer+Care/@31.7544355,73.8173093,13z/data=!4m6!3m5!1s0x3918bfb41d6aaa1f:0x16338d2fa58e77e3!8m2!3d31.7414756!4d73.8287892!16s%2Fg%2F11vf3s9gkg" target="_blank" class="btn btn-outline btn-sm" style="display: flex; width: 100%; align-items: center; justify-content: center; gap: 8px;">
                    <i class="fa-solid fa-map-location-dot"></i> View Location & Directions on Google Maps
                </a>
            </div>
            
            <!-- Contact Form Card -->
            <div class="inquiry-form-card">
                <h3 style="font-size: 1.5rem; margin-bottom: 25px; font-family: var(--font-heading);">Send Us a Message</h3>
                <form id="contactFormDirect" onsubmit="handleContactSubmit(event)">
                    <div class="form-group">
                        <label for="contactName">Full Name</label>
                        <input type="text" id="contactName" class="form-control" placeholder="e.g. Hammad Khan" required>
                    </div>


                    <div class="form-group">
                        <label for="contactService">Select Service</label>
                        <select id="contactService" class="form-control" required>
                            <option value="" disabled selected>Select a Service</option>
                            <option value="cctv">CCTV Camera Installation</option>
                            <option value="sales">Selling & Purchasing Computers & Laptops</option>
                            <option value="repair">Repairing Computers & Laptops</option>
                            <option value="software">System Windows & Software Installation</option>
                            <option value="wifi">Wi-Fi Modems Reset & Setup</option>
                            <option value="accessories">Selling & Purchasing Accessories</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="contactMessage">Message / Project Details</label>
                        <textarea id="contactMessage" class="form-control" rows="4" placeholder="Write details about your requirements here..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-full">Generate Invoice & Send</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Custom Invoice Preview Modal overlay -->
    <div id="invoiceModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(4px); z-index: 3000; align-items: center; justify-content: center; padding: 20px;">
        <div style="background: var(--bg-white); border-radius: var(--radius-md); border: 1px solid var(--border-color); box-shadow: var(--shadow-xl); width: 100%; max-width: 500px; padding: 30px; position: relative; animation: float 0.3s ease;">
            <!-- Modal Close button -->
            <button onclick="closeInvoiceModal()" style="position: absolute; top: 20px; right: 20px; background: none; border: none; font-size: 1.3rem; cursor: pointer; color: var(--text-muted);"><i class="fa-solid fa-xmark"></i></button>
            
            <!-- Invoice header -->
            <div style="border-bottom: 2px dashed var(--border-color); padding-bottom: 15px; margin-bottom: 20px; text-align: center;">
                <div style="font-family: var(--font-heading); font-weight: 800; font-size: 1.25rem; color: var(--secondary-color); margin-bottom: 5px;">
                    <i class="fa-solid fa-file-invoice" style="color: var(--primary-color); margin-right: 5px;"></i> INQUIRY INVOICE
                </div>
                <p style="font-size: 0.8rem; color: var(--text-muted); font-weight: 700; text-transform: uppercase;">Shami Computer Care & CCTV</p>
                <p id="invoiceDate" style="font-size: 0.75rem; color: var(--text-muted); margin-top: 5px;"></p>
            </div>
            
            <!-- Invoice fields -->
            <div style="font-size: 0.9rem; color: var(--text-color); margin-bottom: 25px; line-height: 1.8;">
                <p style="margin-bottom: 8px;"><strong>Customer Name:</strong> <span id="invName" style="color: var(--text-dark);"></span></p>

                <p style="margin-bottom: 8px;"><strong>Selected Service:</strong> <span id="invService" style="color: var(--primary-color); font-weight: 700;"></span></p>
                <p style="margin-top: 15px; margin-bottom: 5px;"><strong>Details:</strong></p>
                <div id="invMessage" style="background: var(--bg-light); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: 12px; font-size: 0.85rem; max-height: 120px; overflow-y: auto; white-space: pre-wrap; color: var(--text-color); line-height: 1.5;"></div>
            </div>
            
            <!-- Invoice actions -->
            <div style="border-top: 1px solid var(--border-color); padding-top: 20px; display: flex; gap: 10px;">
                <button onclick="closeInvoiceModal()" class="btn btn-outline" style="flex: 1; padding: 10px 0;">Cancel</button>
                <button onclick="sendToWhatsApp()" class="btn btn-primary" style="flex: 1; display: flex; align-items: center; justify-content: center; gap: 8px; padding: 10px 0;">
                    <i class="fa-brands fa-whatsapp" style="font-size: 1.1rem;"></i> Send to WhatsApp
                </button>
            </div>
        </div>
    </div>

    <!-- Custom Toast Alert Popups -->
    <div class="toast-alert" id="contactToast">
        <div class="badge-icon" style="background-color: var(--primary-hover); color: var(--bg-white);">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <div>
            <h4 style="color: var(--bg-white); font-size: 0.95rem; margin-bottom: 2px;">Inquiry Invoice Generated!</h4>
            <p style="color: #94a3b8; font-size: 0.8rem;">Redirecting to WhatsApp support...</p>
        </div>
    </div>

    <!-- Contact Form Handling Script -->
    <script>
        let invoiceData = {};

        // Auto-select service from URL parameter on load
        window.addEventListener('DOMContentLoaded', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const serviceParam = urlParams.get('service');
            if (serviceParam) {
                const selectElement = document.getElementById('contactService');
                if (selectElement) {
                    selectElement.value = serviceParam;
                }
            }
        });

        function handleContactSubmit(event) {
            event.preventDefault();
            
            const name = document.getElementById('contactName').value;
            const message = document.getElementById('contactMessage').value;
            
            const serviceSelect = document.getElementById('contactService');
            const serviceText = serviceSelect.options[serviceSelect.selectedIndex].text;
            
            // Store invoice data globally
            invoiceData = {
                name,
                serviceText,
                message
            };
            
            // Populate Modal Fields
            document.getElementById('invName').innerText = name;
            document.getElementById('invService').innerText = serviceText;
            document.getElementById('invMessage').innerText = message;
            
            const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
            document.getElementById('invoiceDate').innerText = new Date().toLocaleDateString('en-US', options);
            
            // Open Modal
            document.getElementById('invoiceModal').style.display = 'flex';
        }

        function closeInvoiceModal() {
            document.getElementById('invoiceModal').style.display = 'none';
        }

        function sendToWhatsApp() {
            // Invoice Message template for WhatsApp
            const textMessage = 
`📄 *INQUIRY INVOICE - SHAMI COMPUTER CARE*
----------------------------------------
*Client Name:* ${invoiceData.name}
*Service Requested:* ${invoiceData.serviceText}

*Project Details:*
${invoiceData.message}
----------------------------------------
_Generated via Shami Computer Care & CCTV Website_`;

            // Prepare WhatsApp URL (Sending to business hotline number)
            const businessPhone = "923064565908"; 
            const waUrl = `https://wa.me/${businessPhone}?text=${encodeURIComponent(textMessage)}`;
            
            // Redirect to WhatsApp
            window.open(waUrl, '_blank');
            
            // Hide modal and reset form
            document.getElementById('invoiceModal').style.display = 'none';
            document.getElementById('contactFormDirect').reset();
            
            // Show toast
            const toast = document.getElementById('contactToast');
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, 4000);
        }
    </script>

@endsection
