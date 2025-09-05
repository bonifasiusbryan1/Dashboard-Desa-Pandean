<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('images/background.jpg') }}');
            background-size: cover;
            font-family: 'Inter', sans-serif;
        }
        .glass-effect {
            background-color: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .error-message {
            color: white;
            font-weight: 600;
            margin-top: 5px;
            margin-bottom: 10px;
            background-color: red;
            padding: 8px;
            border-radius: 10px;
            font-size: 12px; 
        }
    </style>
</head>

<body class="h-screen flex items-center justify-center">
    <div class="container flex flex-col mx-auto rounded-lg pt-12 my-3 w-full max-w-md glass-effect">
        <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
            <div class="flex items-center justify-center w-full lg:p-12">
                <div class="flex items-center xl:p-10">
                    <form action="{{ route('login') }}" method="POST" class="flex flex-col w-full h-full pb-6 text-center rounded-3xl">
                        @csrf
                        <h3 class="mb-3 text-2xl md:text-3xl lg:text-4xl font-extrabold text-dark-grey-900">
                            Selamat Datang
                        </h3>
                        <p class="mb-4 text-sm md:text-base lg:text-lg text-grey-700">
                            Desa Pandean, Kecamatan Ngablak, Kabupaten Magelang
                        </p>
                        <div class="flex items-center mb-3">
                            <hr class="h-0 border-b border-solid border-grey-500 grow">
                            <hr class="h-0 border-b border-solid border-grey-500 grow">
                        </div>
                        @if ($errors->any())
                            <div class="error-message">
                                @if ($errors->has('username_password'))
                                    <p>{{ $errors->first('username_password') }}</p>
                                @else
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                @endif
                            </div>
                        @endif
                        <label for="username" class="mb-2 text-sm md:text-base lg:text-lg text-start text-grey-900">
                            Username*
                        </label>
                        <input id="username" name="username" type="text" placeholder="Masukkan username Anda" class="flex items-center w-full px-5 py-4 mr-2 text-sm md:text-base lg:text-lg font-medium outline-none focus:bg-grey-400 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
                        <label for="password" class="mb-2 text-sm md:text-base lg:text-lg text-start text-grey-900">
                            Password*
                        </label>
                        <input id="password" name="password" type="password" placeholder="Masukkan password Anda" class="flex items-center w-full px-5 py-4 mb-5 mr-2 text-sm md:text-base lg:text-lg font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
                        <div class="flex flex-row justify-between mb-3"></div>
                        <button type="submit" class="w-full px-6 py-5 mb-2 text-sm md:text-base lg:text-lg font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-purple-blue-600 focus:ring-4 focus:ring-purple-blue-100 bg-purple-blue-500 mx-auto">
                            Masuk
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>