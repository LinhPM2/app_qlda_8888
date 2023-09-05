<?

namespace App\Http\Service;

use App\Interfaces\ICrud;
use IUserRepository;

class UserService
{
    public function __construct(private IUserRepository $userRepository)
    {
    }
}
