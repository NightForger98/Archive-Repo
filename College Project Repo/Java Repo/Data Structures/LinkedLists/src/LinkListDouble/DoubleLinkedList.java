package LinkListDouble;

public class DoubleLinkedList <Item> {
	
	private Node<Item> head;
	private Node<Item> tail;
	private Node<Item> current;
	private int length;
	
	
	DoubleLinkedList(){head=tail = null;}
	DoubleLinkedList(Node<Item> i){
		if(i== null)
			return;	
		i.setNext(null);
		i.setPrevious(null);
		current = head = tail = i;
		++length;	
	}
	public boolean isEmpty() {return head == null;}
	public Node <Item> getHead(){return head;}
	public Node <Item> getCurrent(){return current;}
	public Node <Item> getTail(){return tail;}
	public int length() {return length;}
	public void addNodeAtHead(Node<Item> n ) {
		addNode(n);
	}
	public void addNodeAtEnd(Node<Item> n ) {
		tail.setNext(n);
		n.setPrevious(tail);
		tail = n;
		++length;
		
	}
	public void addNode(Node<Item> n ) {
		if(n == null)
			return;
		if(isEmpty()) {
			current = head = tail = n;
			head.setNext(null);
			tail.setPrevious(null);
			
		}
		else {
			n.setNext(head);
			head.setPrevious(n);
			current = head = n;
		}
		++length;
	}
	public Node<Item> removeFromFront(){
		
		if(isEmpty())
			return null;
		Node <Item> crr = head;
		head.getNext().setPrevious(null);
		head = head.getNext();
		crr.setNext(null);
		current = head;
		--length;
		return crr;
		}
	public Node<Item> removeFromEnd(){
		if(isEmpty())
			return null;
		Node<Item> crr = tail;
		tail.getPrevious().setNext(null);
		tail = tail.getPrevious();
		crr.setPrevious(null);
		current = tail;
		--length;
		return crr;
	}
		
		
		
		
		

	public Node<Item> remove(Node <Item> n){
		Node <Item> crr = head;
		if(isEmpty())
			return null;
		if(head.getItem() == n.getItem())
		return removeFromFront();
	while(crr != tail && crr.getItem() != n.getItem()) {
		crr = crr.getNext();
		
	}
	if(crr.getNext() == null) {
		System.out.println(n + "was not found");
		return null;
	}
	crr.getPrevious().setNext(crr.getNext());
	crr.getNext().setPrevious(crr.getPrevious());
	--length;
	return crr;
	}
	public void displayLinkedListForward() {
		Node<Item> crr = head;
		while ( crr != null) {  
			System.out.println(crr.getItem()+ " ");
		crr = crr.getNext();
		}
		System.out.println();
		
	}
	public void displayLinkedListBackward() {	
		Node<Item> crr = tail;
	while ( crr != null) {  
		System.out.println(crr.getItem()+ " ");
	crr = crr.getPrevious();
	}
	System.out.println();}
	public String toString() {return "no meth yet";}
	
	
}
