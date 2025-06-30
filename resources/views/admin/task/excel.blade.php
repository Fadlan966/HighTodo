<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped">
    <thead class="thead-dark">
      <tr>
        <th colspan="6" class="text-center bg-primary text-white py-3">
          <h4 class="m-0">Task Data Report</h4>
        </th>
      </tr>
      <tr>
        <th colspan="6" class="text-center bg-light py-2">
          <small class="text-muted">Date : {{ $date }} | {{ $time }}</small>
        </th>
      </tr>
      <tr class="bg-gray-200">
        <th class="text-center align-middle">No</th>
        <th class="align-middle">Employee Name</th>
        <th class="align-middle">Email</th>
        <th class="align-middle">Task Description</th>
        <th class="text-center align-middle">Start Date</th>
        <th class="text-center align-middle">End Date</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($task as $item)
      <tr>
        <td class="text-center align-middle">{{ $loop->iteration }}</td>
        <td class="align-middle">{{ $item->user->name }}</td>
        <td class="align-middle">{{ $item->user->email }}</td>
        <td class="align-middle">{{ $item->task }}</td>
        <td class="text-center align-middle">{{ $item->start_date }}</td>
        <td class="text-center align-middle">{{ $item->end_date }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
