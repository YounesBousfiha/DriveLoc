<?php

namespace Younes\DriveLoc\Helpers;

class Helpers {
    public static function generateToken() {
        return bin2hex(random_bytes(32));
    }

    public static function redirect($url) {
        return header("Location:" . $url);
    }

    public static function ValidateData($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function renderVehicule($vehicule) {
        return '
        <div class="bg-white rounded p-4 cursor-pointer hover:-translate-y-1 transition-all relative">
            <div class="mb-4 bg-gray-100 rounded p-2">
                <img src="https://readymadeui.com/images/product9.webp" alt="Product 1" class="aspect-[33/35] w-full object-contain" />
            </div>
            <div data-id="' . $vehicule['vehicule_id'] . '">
                <div class="flex gap-2">
                    <h5 class="text-base font-bold text-gray-800">' . $vehicule['vehicule_marque'] . '</h5>
                    <h6 class="text-base text-gray-800 font-bold ml-auto"> $' . $vehicule['vehicule_prix'] . '</h6>
                </div>
                <p class="text-gray-500 text-[13px] mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <div class="flex items-center gap-2 mt-4">
                    <div class="bg-pink-100 hover:bg-pink-200 w-12 h-9 flex items-center justify-center rounded cursor-pointer" title="Wishlist">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" class="fill-pink-600 inline-block" viewBox="0 0 64 64">
                            <path d="M45.5 4A18.53 18.53 0 0 0 32 9.86 18.5 18.5 0 0 0 0 22.5C0 40.92 29.71 59 31 59.71a2 2 0 0 0 2.06 0C34.29 59 64 40.92 64 22.5A18.52 18.52 0 0 0 45.5 4ZM32 55.64C26.83 52.34 4 36.92 4 22.5a14.5 14.5 0 0 1 26.36-8.33 2 2 0 0 0 3.27 0A14.5 14.5 0 0 1 60 22.5c0 14.41-22.83 29.83-28 33.14Z" data-original="#000000"></path>
                        </svg>
                    </div>
                    <button type="button" onclick="setModalDataId(this)" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="text-sm px-2 h-9 font-semibold w-full bg-blue-600 hover:bg-blue-700 text-white tracking-wide ml-auto outline-none border-none rounded">Reserver</button>
                </div>
            </div>
        </div>';
    }

    public static function renderReservation($reservation) {
        return '
            <tr>
                <td class="w-1/6 text-left py-3 px-4">' . $reservation['vehicule_marque'] . '</td>
                <td class="w-1/6 text-left py-3 px-4">' . $reservation['vehicule_modele'] . '</td>
                <td class="w-1/6 text-left py-3 px-4">' . $reservation['vehicule_annee'] . '</td>
                <td class="w-1/6 text-left py-3 px-4">$' . $reservation['vehicule_prix'] . '</td>
                <td class="w-1/6 text-left py-3 px-4">' . $reservation['reservation_lieux'] . '</td>
                <td class="w-1/6 text-left py-3 px-4">' . $reservation['reservation_date'] . '</td>
                <td class="w-1/6 text-left py-3 px-4">
                    <span class="' . ($reservation['reservation_status'] == 'Pending' ? 'bg-yellow-200 text-yellow-800' : ($reservation['reservation_status'] == 'Approuve' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800')) . ' py-1 px-3 rounded-full text-xs">
                        ' . $reservation['reservation_status'] . '
                    </span>
                </td>
            </tr>';
    }

    public static function renderReservationForAdmin($reservation) {
        return '<tr>
                                    <td class="w-1/4 text-left py-3 ">' . $reservation['email'] . '</td>
                                    <td class="w-1/4 text-left py-3 px-4">' . $reservation['vehicule_marque'] . '</td>
                                    <td class="w-1/4 text-left py-3 px-4">$' . $reservation['vehicule_prix'] . '</td>
                                    <td class="text-left py-3 px-4">' . $reservation['categorie_nom'] . '</td>
                                    <td class="w-1/4 text-left py-3 px-4">' . $reservation['reservation_date'] . '</td>
                                    <td class="w-1/4 text-left py-3 px-4">' . $reservation['reservation_lieux'] . '</td>
                                    <td class="w-1/4 text-left py-3 px-4">
                                        <span class="' . ($reservation['reservation_status'] == 'Pending' ? 'bg-yellow-200 text-yellow-800' : ($reservation['reservation_status'] == 'Approuve' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800')) . ' text-white px-2 py-1 rounded-xl">
                        ' . $reservation['reservation_status'] . '</span>
                                    </td>
                                    <td class="text-left py-3 px-4 flex space-x-2">
                                        <button class="bg-green-500 text-white px-2 py-1 rounded flex items-center">
                                            <i class="fas fa-check"></i> <a href="./actions/reservation/approuve_reservation.php?id=' . $reservation['reservation_id'] . '">Approuver</a>
                                        </button>
                                        <button class="bg-red-500 text-white px-2 py-1 rounded flex items-center">
                                            <i class="fas fa-times"></i> <a href="./actions/reservation/reject_reservation.php?id=' . $reservation['reservation_id'] .'">Reject</a>
                                        </button>
                                    </td>
                                </tr>';
    }

    public static function  renderVehiculeForAdmin($vehicule)
    {
        return '<tr>
                                    <td class="w-1/4 text-left py-3 px-4">'. $vehicule['vehicule_marque']. '</td>
                                    <td class="w-1/4 text-left py-3 px-4">'. $vehicule['vehicule_modele']. '</td>
                                    <td class="w-1/4 text-left py-3 px-4">'. $vehicule['vehicule_prix']. '</td>
                                    <td class="w-1/4 text-left py-3 px-4">'. $vehicule['vehicule_disponibilite']. '</td>
                                    <td class="text-left py-3 px-4 flex space-x-2">
                                        <button class="bg-yellow-500 text-white px-2 py-1 rounded flex items-center">
                                            <i class="fas fa-edit"></i>
                                        </button>
        
                                            <a class="bg-red-500 text-white px-2 py-1 rounded flex items-center" href="./actions/vehicule/delete_vehicule.php?id=' . $vehicule['vehicule_id'] . '"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>';
    }
}