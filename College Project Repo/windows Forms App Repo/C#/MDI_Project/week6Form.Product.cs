using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MDI_Project
{
    internal class Product
    {
        string name;
        double price;

        public Product(string name, double price)
        {
            this.name = name;
            this.price = price;

        }

        public string Name { get => name; set => name = value; }
        public double Price { get => price; set => price = value; }
    }
}
