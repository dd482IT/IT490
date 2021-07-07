using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RockController : MonoBehaviour
{
    public float speed = 5;
    private int damage = 1;

    public GameObject effect;

    private void Update()
    {

        transform.Translate(Vector2.left * speed * Time.deltaTime);

    }

    void OnTriggerEnter2D(Collider2D other)
    {
        if (other.CompareTag("Player"))
        {
            Instantiate(effect, transform.position, Quaternion.identity);

            other.GetComponent<Player>().health -= damage;
            Debug.Log("Health: " + other.GetComponent<Player>().health);
            Destroy(gameObject);
        }
    }


}

