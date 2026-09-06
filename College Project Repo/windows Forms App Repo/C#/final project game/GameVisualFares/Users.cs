using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace VisualProjectGame
{
    internal class Users
    {
        String name;
        String password;
        Boolean isAdmin;
        public Users (String name, String password, Boolean isAdmin)
        {
            this.name = name;
            this.password = password;
            this.isAdmin = isAdmin;
        }
        public string Name { get => name; set => name = value; }
        public string Pass { get => password; set => password = value; }
        public Boolean IsAdmin { get => isAdmin; set => isAdmin = value; }
    }
}
