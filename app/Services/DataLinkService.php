<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DataLinkService
{
    protected string $pathCrew = 'https://link.pengenumroh.com/data-crew.json';
    protected string $pathMember = 'https://link.pengenumroh.com/data-member.json';

    public function getCrewData(?string $search = null): array
    {
        try {
            $response = Http::timeout(10)->get($this->pathCrew);
            $data = $response->successful() ? $response->json() : [];

            if (!empty($search)) {
                $data = array_filter($data, function ($item) use ($search) {
                    return stripos($item['nama'] ?? '', $search) !== false ||
                           stripos($item['noHP'] ?? '', $search) !== false;
                });
            }

            return array_values($data);
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getMemberData(?string $search = null): array
    {
        try {
            $response = Http::timeout(10)->get($this->pathMember);
            $data = $response->successful() ? $response->json() : [];

            if (!empty($search)) {
                $data = array_filter($data, function ($item) use ($search) {
                    return stripos($item['namaMember'] ?? '', $search) !== false;
                });
            }

            return array_values($data);
        } catch (\Exception $e) {
            return [];
        }
    }

    // Aksi API untuk Crew
    public function sendPostRequest(string $url, array $data): array
    {
        $response = Http::asForm()->post($url, $data);
        return $response->json() ?? ['status' => false, 'message' => 'Gagal terhubung ke server.'];
    }

    public function sendJsonPostRequest(string $url, array $data): array
    {
        $response = Http::post($url, $data);
        return $response->json() ?? ['status' => false, 'message' => 'Gagal terhubung ke server.'];
    }

    public function sendDeleteRequest(string $url, array $data): array
    {
        $response = Http::delete($url, $data);
        return $response->json() ?? ['status' => false, 'message' => 'Gagal menghapus data.'];
    }
}