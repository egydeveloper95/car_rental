<?php
include_once 'header.php';
include_once 'user.php';
include_once 'reservation.php';
include_once 'car.php';
$car = new car();
$user = new user();
$reservation = new reservation();
if (loggedin()) {
    $history = $user->ShowHistory();
} else {

    header('location:index.php');
}
?>
<table class = "table table-bordered">
    <tbody>
    <Br> <BR>
    <h4> User History Information</h4> 

    <br>
    <tr class = "techSpecRow"><th>Reservation-ID</th><th>Brand</th><th>Model</th><th>Start-Date</th><th>End-Date</th><th>Status</th><th>Payment Method</th></tr>
<?php
foreach ($history as $row) {
    $reservation_id = $row['reservation_id'];
    $reservation_info = $user->GetReservationInfo($reservation_id);
    foreach ($reservation_info as $value) {
        $start_date = $value['start_date'];
        $end_date = $value['end_date'];
        $r_s_id = $value['r_s_id'];
        $payment_id = $value['payment_id'];
        $car_id = $value['car_id'];
        $carinfo = $car->GetCarDetails($car_id);
        $model = $carinfo['model'];
        $brand_id = $carinfo['brand_id'];
        $brand = $car->GetCarBrand($brand_id);
        echo '<tr class = "techSpecRow"><th>' . $reservation_id . '</th><th>' . $brand . '</th><th>' . $model . '</th><th>' . $start_date . '</th><th>' . $end_date . '</th><th>' . $reservation->GetReservationStatus($r_s_id) . '</th><th>' . $reservation->GetPaymentMethod($payment_id) . '</th></tr>';
    }
}
?>



</tbody>
</table>
<br><br><br><br><br><br><br><br>


<?php
include_once 'footer.php';
?>