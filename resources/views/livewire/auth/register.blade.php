<div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">

    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
        <form class="space-y-6" wire:submit.prevent="register">
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700">
              Name
            </label>
            <div class="mt-1">
              <input wire:model.lazy="name" id="name" name="name" type="text" class="@error('name') border-red-500 @enderror appearance-none block w-full px-3 py-2 border rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            @error('name')<div class="mt-1 text-red-500 text-sm">{{ $message }}</div>@enderror
          </div>

          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
              Email address
            </label>
            <div class="mt-1">
              <input wire:model="email" id="email" name="email" type="email" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            @error('email')<div class="mt-1 text-red-500 text-sm">{{ $message }}</div>@enderror
          </div>

          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">
              Password
            </label>
            <div class="mt-1">
              <input wire:model.lazy="password" id="password" name="password" type="password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            @error('password')<div class="mt-1 text-red-500 text-sm">{{ $message }}</div>@enderror
          </div>

          <div>
            <label for="passwordConfirmation" class="block text-sm font-medium text-gray-700">
              Password Confirmation
            </label>
            <div class="mt-1">
              <input wire:model.lazy="passwordConfirmation" id="passwordConfirmation" name="passwordConfirmation" type="password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            @error('passwordConfirmation')<div class="mt-1 text-red-500 text-sm">{{ $message }}</div>@enderror
          </div>

          <div>
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Register
            </button>
          </div>
        </form>

        <div class="mt-6">
            <p class="mt-2 text-center text-sm text-gray-600 max-w">
                <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Already have an account?
                </a>
            </p>
        </div>
      </div>
    </div>
  </div>
