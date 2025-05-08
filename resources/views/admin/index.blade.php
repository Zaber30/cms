<div>
    <table>
        <thead>
            <th>Name</th>
             <th>Email</th>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->pictures)  <!-- Check if the user has a picture -->
                    {{-- {{ $user->pictures->image }}  <!-- Access the image of the single picture --> --}}
                     <img src="{{ asset('images/' . $user->pictures->image) }}" alt="User Image" width="300">
                      @else
                    No image uploaded
                   @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-2">
    {{ $users->links() }}
    </div>
  </div>