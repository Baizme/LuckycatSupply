<x-sidebar></x-sidebar>
<x-navbar></x-navbar>

<x-layout>
    <h3>Account Setting</h3>
    <div style="max-width: 750px; margin-left: 30px; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        @if(session('success'))
            <div style="margin-bottom: 15px; padding: 10px; border: 1px solid green; color: green; border-radius: 5px;">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div style="margin-bottom: 15px; padding: 10px; border: 1px solid red; color: red; border-radius: 5px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div style="text-align: center; margin-bottom: 20px;">
            <img src="{{ asset('images/luckycat_logo.jpg') }}" alt="Profile Image" style="width: 100px; height: 100px; border-radius: 50%;">
            <div style="margin-top: 10px;">
                <input type="file" id="profileImage" name="profileImage" accept="image/*" style="padding: 8px;">
            </div>
        </div>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="username" style="display: block; margin-bottom: 5px;">Username</label>
                <input type="text" id="username" name="username" value="{{ Auth::user()->name }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; margin-bottom: 5px;">Email</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="password" style="display: block; margin-bottom: 5px;">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="password_confirmation" style="display: block; margin-bottom: 5px;">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="phone" style="display: block; margin-bottom: 5px;">Phone</label>
                <input type="tel" id="phone" name="phone" value="{{ Auth::user()->phone }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="address" style="display: block; margin-bottom: 5px;">Address</label>
                <input type="text" id="address" name="address" value="{{ Auth::user()->address }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
            </div>
            <div style="text-align: end;">
                <button type="submit" style="padding: 10px 20px; border: none; border-radius: 5px; background-color: #7c43f8; color: #fff; cursor: pointer;">Update</button>
            </div>
        </form>
    </div>
</x-layout>
