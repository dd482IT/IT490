using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RockController : MonoBehaviour
{
    private float speed;
    private int damage = 1;

    public GameObject effect;

    private void Update()
    {
        speed = SpeedManager.speed;
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

