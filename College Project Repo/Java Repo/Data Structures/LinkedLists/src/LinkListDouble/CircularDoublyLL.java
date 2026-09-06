package LinkListDouble;

public class CircularDoublyLL <Item>{
	private Node<Item> head;
	private Node<Item> current;
	private int length;
	CircularDoublyLL() {head = current = null;}
	CircularDoublyLL(Node<Item> i){
		if(i==null)
			return;
		i.setNext(i);
		i.setPrevious(i);
		current = head = i;
		++length;
		}
	
	public boolean isEmpty() {return head == null;}
	public Node <Item> getHead(){return head;}
	public Node <Item> getCurrent(){return current;}
	public int length() {return length;}
	@Override
	public String toString() {
		return getClass()+ ": "+ length();
	}
	public void addNode(Node<Item> n) {
		if(n == null)
			return;
		if(isEmpty()) {
			current = head = n;
			head.setNext(head);
			head.setPrevious(head);
		}
		else {
			n.setNext(current.getNext());
			n.setPrevious(current);
			current.setNext(n);
			head.setPrevious(n);
			current = n;
		}
		++length;
	}
	
	public Node<Item> removeNodeAtCurrent(){
		if(isEmpty())
			return null;
		Node<Item> back = current.getPrevious();
		Node<Item> front = current.getNext();
		back.setNext(current.getNext());
		front.setPrevious(current.getPrevious());
		front = current;
		current.setNext(null);
		current.setPrevious(null);
		current = back;
		--length;
		return front;
		
	} 
	public Node<Item> removeHeadNode(){
		Node<Item> temp = head;
		if(isEmpty())
			return null;
		head = head.getNext();
		head.setPrevious(temp.getPrevious());
		current.setNext(temp.getNext());
		temp.setNext(null);
		temp.setPrevious(null);
		--length;
		return temp;
	}
	public Node<Item> rempve(Node<Item> n){
		Node<Item> crr = current, temp;
		if(isEmpty())
			return null;
		int i;
		for(i = 0; i< length(); ++i) {
			if(crr.getItem() == n.getItem())
				break;
			crr = crr.getNext();
		}
		if(i != length()) {
			temp = current;
			current = crr;
			crr = removeNodeAtCurrent();
			current = temp;
			return crr;
		}
		return null;
	}
	public void displayLinkedListForward() {
		Node<Item> crr = head;
		for(int i = 0; i< length() - 1; ++i) {
			System.out.println(crr.getItem());
			crr = crr.getNext();
		}
		System.out.println(crr.getItem());
		
	}
	public void displayLinkedListBackward() {
		Node<Item> crr = head.getPrevious();
		for(int i = 0; i < length() - 1;++i) {
			System.out.println(crr.getItem() + ", ");
			crr = crr.getPrevious();
		}
		System.out.println(crr.getItem());
		
	}
}
