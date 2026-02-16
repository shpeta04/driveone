@extends('layouts.app')

@section('content')

    <section class="pt-28 pb-32 bg-black text-gray-200">

        {{-- HERO --}}
        <div class="text-center mb-24 px-6">
            <h1 class="text-5xl md:text-6xl font-semibold mb-6"
                style="font-family: 'Playfair Display', serif;">
                Contact DriveOne
            </h1>

            <p class="text-gray-500 tracking-wide max-w-2xl mx-auto">
                Private consultations. Exclusive vehicle sourcing.
                Tailored showroom experiences.
            </p>
        </div>

        {{-- CONTACT GRID --}}
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-16">

            {{-- LEFT INFO --}}
            <div class="space-y-10">

                <div>
                    <p class="text-gray-500 uppercase text-xs tracking-widest mb-2">
                        Showroom Location
                    </p>
                    <p class="text-white text-lg">
                        Prishtinë, Kosovo
                    </p>
                </div>

                <div>
                    <p class="text-gray-500 uppercase text-xs tracking-widest mb-2">
                        Phone
                    </p>
                    <p class="text-white text-lg">
                        +383 44 000 000
                    </p>
                </div>

                <div>
                    <p class="text-gray-500 uppercase text-xs tracking-widest mb-2">
                        Email
                    </p>
                    <p class="text-white text-lg">
                        sales@driveone.com
                    </p>
                </div>

                <div class="pt-6">
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Our team is available by appointment only.
                        We recommend scheduling in advance for a private consultation.
                    </p>
                </div>

            </div>

            {{-- RIGHT FORM --}}
            <div class="relative p-10 rounded-2xl
            bg-white/5 backdrop-blur-xl
            border border-white/10
            shadow-2xl overflow-hidden">

                <div class="absolute -top-20 -right-20 w-60 h-60 bg-yellow-500/10 rounded-full blur-3xl"></div>

                <form method="POST" action="{{ route('contact.submit') }}" class="space-y-6 relative z-10">
                    @csrf

                    <input type="text" name="name"
                           placeholder="Full Name"
                           class="form-input">

                    <input type="email" name="email"
                           placeholder="Email Address"
                           class="form-input">

                    <input type="text" name="phone"
                           placeholder="Phone Number (optional)"
                           class="form-input">

                    <textarea name="message"
                              rows="4"
                              placeholder="Your Message"
                              class="form-input resize-none"></textarea>

                    <button type="submit"
                            class="w-full bg-yellow-500 text-black py-4 rounded-lg
                               font-semibold tracking-wider
                               hover:bg-yellow-400 transition">
                        SEND MESSAGE
                    </button>
                </form>

            </div>

        </div>

    </section>

@endsection
