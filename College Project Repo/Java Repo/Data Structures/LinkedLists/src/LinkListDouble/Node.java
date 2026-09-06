package LinkListDouble;



public class Node <Item>{
	protected Item item;
	protected Node<Item> next;
	protected Node<Item> previous;
	Node(){this(null,null);}
	Node (Item i, Node<Item> n){
		setItem(i);
		setNext(n);
		setPrevious(n);
	}
		
public Node(Item i) {
	setItem (i);
	setNext(null);	
	setPrevious(null);
	}
public Node<Item> getPrevious(){return previous;}
public void setPrevious (Node<Item> n) {next = n ;}
public void setItem (Item i) {item = i;}
public void setNext (Node<Item> n) {next = n ;}
public Item getItem() {return item;}
public Node<Item> getNext(){return next;}
@Override
public String toString() { return "data: " + getItem();
}
public int compareTo(Node<Item> thatNode) {
	// TODO Auto-generated method stub
	return 0;
}//I didn't find this method in the lecture
}