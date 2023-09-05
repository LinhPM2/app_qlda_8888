<?

namespace App\Interfaces;

interface ICrud
{
    public function create_resource($resource);
    public function edit_resource($resource);
    public function delete_resource($resourceId);
}
