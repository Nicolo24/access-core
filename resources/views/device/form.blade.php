<!DOCTYPE html>
<html>
<head>
    <title>Create Device</title>
</head>
<body>
    <form action="/api/devices/store" method="GET">
        <label for="name">Device Name:</label><br>
        <input type="text" id="device_name" name="device_name"><br>
        <label for="serial_number">Serial Number:</label><br>
        <select id="serial_number" name="serial_number">
            @foreach ($seenSerialNumbers as $serialNumber)
                <option value="{{ $serialNumber->serial_number }}">{{ $serialNumber->serial_number }}</option>
            @endforeach
        </select><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>